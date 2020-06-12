<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\I18n\Date;
use Cake\I18n\Time;

/**
 * Bookings Controller
 *
 * @property \App\Model\Table\BookingsTable $Bookings
 */
class BookingsXXController extends AppController {

    public $Maids = null;
    public $Maidschedules = null;
    public $CAddresses = null;
    public $Service = null;
    public $Appsettings = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Maids = TableRegistry::get('Maids');
        $this->CAddresses = TableRegistry::get('CAddresses');
        $this->Maidschedules = TableRegistry::get('Maidschedules');
        $this->Services = TableRegistry::get('Services');
        $this->Appsettings = TableRegistry::get('Appsettings');
    }

    public function index() {
        $this->Appsettings = TableRegistry::get('Appsettings');
        $query = $this->Appsettings->find('all');
        $appsetting = $query->first();
        $areas = Configure::read('SERVICE_AREA');
        $services = Configure::read('SERVICE_TYPE');
        $packages = Configure::read('PACKAGE');
        
        $this->set('appsetting', $appsetting);
        $this->set('areas', $areas);
        $this->set('services', $services);
        $this->set('packages', $packages);
    }

    public function index_() {


        if ($this->request->is('post')) {
            $data = $this->request->getData();

            $this->request->session()->write('Book', $data);


            return $this->redirect(['action' => 'selectmaid']);
        }

        $query = $this->Services->find('all', [
            'conditions' => ['Services.type' => 'Add-ons'],
            'order' => ['seq' => 'ASC']
        ]);

        $addons = $query->toArray();

        $areas = Configure::read('SERVICE_AREA');
        $services = Configure::read('SERVICE_TYPE');
        $rooms = Configure::read('ROOM');
        $hours = Configure::read('HOUR');
        $times = Configure::read('TIME');
        $packages = Configure::read('PACKAGE');

        $query = $this->Appsettings->find('all');
        $appsetting = $query->first();

        $this->set('areas', $areas);
        $this->set('addons', $addons);
        $this->set('services', $services);
        $this->set('rooms', $rooms);
        $this->set('hours', $hours);
        $this->set('times', $times);
        $this->set('packages', $packages);
        $this->set('appsetting', $appsetting);
    }

    public function selectmaid() {
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $maid = $this->Maids->get($data['maid_id']);

            if (!is_null($maid)) {
                $this->request->session()->write('Book.maid_id', $data['maid_id']);
                return $this->redirect(['action' => 'step2']);
            }
        }

        $query = $this->Maids->find('all');
        $query->contain(['Users' => 'Images', 'Comments']);
        $maids = $query->toArray();
        $this->set('maids', $maids);
    }

    public function step2() {

        //debug($this->request->session()->read('Book'));
        //Get user from session
        $user_id = NULL;
        if (!(is_null($this->request->session()->read('Auth.User')))) {
            $user_id = $this->request->session()->read('Auth.User.id');
        }

        $user = NULL;
        if (is_null($user_id)) {
            $user = $this->Maids->Users->newEntity();
        } else {
            $user = $this->Maids->Users->get($user_id, [
                'contain' => ['CAddresses' => ['CProvinces']]
            ]);
        }
        //end

        $address = null;
        if (isset($user->c_addresses) && $user->c_addresses != null && $user->c_addresses != []) {
            $address = $this->CAddresses->get($user->c_addresses[0] . id);
        } else {
            $address = $this->CAddresses->newEntity();
            $address->seq = 1;
        }


        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            //save user
            /* User */
            $user = $this->Maids->Users->patchEntity($user, $data);
            $user->username = '';
            $user->isactive = 'Y';
            if ($user->usertype == null || $user->usertype == '') {
                $user->usertype = M_USER_TYPE_MEMBER;
            }

            $user['c_addresses'][0]['seq'] = 1;

            $map_position = $data['position'];
            $map_position = str_replace('(', '', $map_position);
            $map_position = str_replace(')', '', $map_position);

            $map_position = explode(',', $map_position);
            if (sizeof($map_position) == 2) {
                $user['c_addresses'][0]['lat'] = $map_position[0];
                $$user['c_addresses'][0]['long'] = $map_position[1];
            }


            if ($this->Maids->Users->save($user)) {
                $this->request->session()->write('Book.user_id', $user->id);
                if (is_null($this->request->session()->read('Auth.User'))) {
                    $this->Auth->setUser($user);
                }
                return $this->redirect(['action' => 'step3']);
            }
            //debug($user->errors());
        }

        $areaLatLongs = Configure::read('SERVICE_AREA_LATLONG');
        $lat = $areaLatLongs['Mueng SuratThani']['lat'];
        $long = $areaLatLongs['Mueng SuratThani']['long'];

        $area = $this->request->session()->read('Book.area');
        if ($area != null && $area != '') {
            $lat = $areaLatLongs[$area]['lat'];
            $long = $areaLatLongs[$area]['long'];
        }
        $this->set('lat', $lat);
        $this->set('user', $user);
        $this->set('long', $long);

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function step3() {



        $bookData = $this->request->session()->read('Book');
        $areas = Configure::read('SERVICE_AREA');
        $services = Configure::read('SERVICE_TYPE');
        $rooms = Configure::read('ROOM');
        $hours = Configure::read('HOUR');
        $times = Configure::read('TIME');
        $packages = Configure::read('PACKAGE');

        $query = $this->Services->find('all', [
            'conditions' => ['Services.type' => 'Add-ons'],
            'order' => ['seq' => 'ASC']
        ]);

        $addons = $query->toArray();
        $count = 1;
        $extraService = [];
        foreach ($addons as $addon) {
            if ($bookData['extra_service_' . $count] != 0) {
                array_push($extraService, ['id' => $bookData['extra_service_' . $count], 'hour' => $bookData['hour_' . $count]]);
            }
            $count++;
        }
        $this->request->session()->write('Book.extra_services', $extraService);
        $bookData = $this->request->session()->read('Book');

        //debug($bookData);
        //get user 
        $user = $this->Maids->Users->get($bookData['user_id'], ['contain' => ['Images', 'CAddresses']]);

        //get maid
        $maid = $this->Maids->get($bookData['maid_id'], ['contain' => ['Users']]);

        //get time
        $time = $times[$bookData['time']];

        $hour = $bookData['hour'] / 100;
        $package = $bookData['package'];


        $isDiscount = false;
        $amount = 0;
        $discount = 0;
        $weekAmount = 1;
        $mouthDuration = 1;
        $extraService = 0;

        if ($package === 'M1W') {
            $isDiscount = true;
            $amount = (($hour * RATE_PER_HOUR) );
            $weekAmount = 4;
            $mouthDuration = TOTAL_MONTH;
        } else if ($package === 'M2W') {
            $isDiscount = true;
            $amount = (($hour * RATE_PER_HOUR));
            $weekAmount = 8;
            $mouthDuration = TOTAL_MONTH;
        } else {
            $isDiscount = false;
            $amount = $hour * RATE_PER_HOUR;
        }

        foreach ($bookData['extra_services'] as $value) {
            $extraService = $extraService + (($value['hour'] / 100) * RATE_PER_HOUR);
        }
        $extraService = ($extraService * ($weekAmount * $mouthDuration));
        $amount = ($amount * ($weekAmount * $mouthDuration));

        $amount = $amount + $extraService;



        if ($isDiscount) {
            $discount = (5 / 100) * $amount;
        }

        $this->request->session()->write('Book.totalamt', $amount - $discount);
        $this->request->session()->write('Book.discount', $discount);
        $this->request->session()->write('Book.amount', $amount);



        $this->set('area', $bookData['area']);
        $this->set('service', $services[$bookData['service']]);
        $this->set('date', $bookData['date']);
        $this->set('time', $time);
        $this->set('room', $bookData['room']);
        $this->set('hour', $hour);
        $this->set('package', $packages[$package]);
        $this->set('user', $user);
        $this->set('maid', $maid);





        $this->set('extraService', $extraService);
        $this->set('discount', $discount);
        $this->set('amount', $amount);
        $this->set('totalamt', $amount - $discount);
        //$this->set('area',$this->request->session()->read('Book.package'));
    }

    public function create() {
        $bookingData = $this->request->session()->read('Book');


        $booking = $this->Maids->newEntity();

        $date = new Date($bookingData['date']);
        $time = $bookingData['time'];
        $package = $bookingData['package'];

        //set data

        $booking->date = $date;
        $booking->time = $this->TIME_OPT[$time] . ':00';

        //$booking->roomsize = $roomsize;
        $booking->maid_id = $bookingData['maid_id'];
        $booking->user_id = $bookingData['user_id'];
        $booking->package = $package;
        $booking->price = $bookingData['totalamt'];
        $booking->hour = $bookingData['hour'] / 100;
        $booking->total_room = $bookingData['room'];
        $booking->service_area = $bookingData['area'];
        $booking->ismonthly = $booking->package == 'S' ? 'N' : 'Y';
        $booking->iscompleted = 'N';
        $booking->status = 'CO';
        $booking->service_type = 'Cleaning Service';
        $booking->bookingno = $this->getBookingNo($bookingData['area']);


        if ($this->Bookings->save($booking)) {

            $this->createServiceItem($bookingData['extra_services'], $booking->id);
            $this->createSchedule($bookingData, $booking->id);
            $this->createPayment($bookingData, $booking->id);

            $this->Flash->success(__('Booking is completed.'));
            //$this->request->session()->delete('Book');
            return $this->redirect(['controller' => 'success']);
        }
    }

    private function createServiceItem($extraServices, $bookingId = null) {
        $count = 1;
        $serviceItemModel = TableRegistry::get('ServiceItems');

        foreach ($extraServices as $value) {
            $serviceItem = $serviceItemModel->newEntity();
            $serviceItem->booking_id = $bookingId;
            $serviceItem->service_id = $value['id'];
            $serviceItem->amount = ($value['hour'] / 100) * RATE_PER_HOUR;
            $serviceItem->seq = $count;
            //$serviceItem->description = "";

            $serviceItemModel->save($serviceItem);
            $count++;
        }
    }

    private function createSchedule($bookingData, $bookingId) {
        
    }

    private function createPayment($bookingData, $bookingId) {
        $paymentsModel = TableRegistry::get('Payments');

        $payment = $paymentsModel->newEntity();
        $payment->booking_id = $bookingId;
        $payment->amount = $bookingData['totalamt'];
        $payment->paymentdate = Time::now();
        $payment->status = 'CO';
        $paymentsModel->save($payment);
    }

    private function getBookingNo($city = null) {
        $time = Time::now();
        $code = $time->i18nFormat('yyMMddHHmmss');
        $areaLatLongs = Configure::read('SERVICE_AREA_LATLONG');
        $cityCode = $areaLatLongs[$city]['code'];

        return $cityCode . $code;
    }

}
