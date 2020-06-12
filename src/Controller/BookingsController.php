<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;
use Cake\I18n\Time;

/**
 * Bookings Controller
 *
 * @property \App\Model\Table\BookingsTable $Bookings
 */
class BookingsController extends AppController {

    public $Maids = null;
    public $Maidschedules = null;
    public $CAddresses = null;
    public $Service = null;
    public $Appsettings = null;
    public $SESSION_KEY_BOOKING = "Booking";
    public $areas = null;
    public $services = null;
    public $packages = null;
    public $times = null;
    public $hours = null;
    public $Users = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->loadComponent('Log');
        $this->loadComponent('Sendemail');

        $this->Maids = TableRegistry::get('Maids');
        $this->CAddresses = TableRegistry::get('CAddresses');
        $this->Maidschedules = TableRegistry::get('Maidschedules');
        $this->Services = TableRegistry::get('Services');
        $this->Appsettings = TableRegistry::get('Appsettings');

        $this->areas = Configure::read('SERVICE_AREA');
        $this->services = Configure::read('SERVICE_TYPE');
        $this->packages = Configure::read('PACKAGE');
        $this->times = Configure::read('TIME');
        $this->hours = Configure::read('HOUR');
        $this->Users = TableRegistry::get('Users');

        $this->set('times', $this->times);
        $this->set('hours', $this->hours);
        $this->set('appsetting', $this->appsetting);
        $this->set('areas', $this->areas);
        $this->set('services', $this->services);
        $this->set('packages', $this->packages);

        $this->loadComponent('UserUtils');
        $this->loadComponent('Utils');
    }

    public function index() {

        //$maids = [];
        //$booking = [];
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $booking = $data;

            $this->Log->logDebug($booking);
            //save find data into Session
            $this->request->session()->write($this->SESSION_KEY_BOOKING, $booking);
            return $this->redirect(['action' => 'cleaner']);
        }
        
        $booking = $this->packageVerify();

        $this->set(compact('booking'));

        $query = $this->Appsettings->find('all');
        $appsetting = $query->first();



        //$this->log('out', 'debug');
    }

    public function cleaner() {
        //debug($data);

        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $this->Log->logDebug('select maid');
            $this->Log->logDebug($data);
            $this->request->session()->write($this->SESSION_KEY_BOOKING . '.maid_id', $data['maid_id']);

            if ((is_null($this->request->session()->read('Auth.User')))) {
                return $this->redirect(['action' => 'account']);
            } else {
                return $this->redirect(['action' => 'address']);
            }
            return $this->redirect(['action' => 'confirm']);
        }

        $query = $this->Maids->find('all');
        $query->contain(['Users' => 'Images', 'Comments']);
        //$this->log('find', 'debug');
        $maids = $query->toArray();


        $this->set(compact('maids'));
        $this->set('booking', $this->request->session()->read($this->SESSION_KEY_BOOKING));
        $this->set('_serialize', ['maids']);
    }

    public function address() {
        $users = $this->request->session()->read('Auth.User');
        if (is_null($users)) {
            return $this->redirect(['action' => 'account']);
        }

        $user_id = $users['id'];
        //debug($user_id);
        $users = $this->Users->get($user_id, ['contain' => ['CAddresses' => ['CProvinces']]]);

        $address = [];
        if (is_null($users['c_addresses']) || sizeof($users['c_addresses'])==0) {
            $address = $this->CAddresses->newEntity();
        } else {
            $address = $users['c_addresses'][0];
        }
        //$this->log($address,'debug');

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $address = $this->CAddresses->patchEntity($address, $data);
            //$address_id = $address['id'];
            $address->seq = 1;
            $address->user_id = $user_id;
            
            //$this->log($address,'debug');
            if ($this->CAddresses->save($address)) {
                $this->request->session()->write($this->SESSION_KEY_BOOKING . '.c_address_id', $address->id);
                return $this->redirect(['action' => 'confirm']);
            } else {
                $this->log($address->errors(), 'debug');
            }
        }

        $this->set(compact('address'));

        $provinces = $this->CAddresses->CProvinces->find('list', ['conditions' => ['id' => '67']]);

        $areaLatLongs = Configure::read('SERVICE_AREAS');
        $lat = $areaLatLongs['Samui']['lat'];
        $long = $areaLatLongs['Samui']['long'];
        $this->set('lat', $lat);
        $this->set('long', $long);
        $this->set('provinces', $provinces);
        $this->set('users', $users);
    }

    public function account() {

        if ((is_null($this->request->session()->read('Auth.User')))) {
            //return $this->redirect(['action' => 'account']);
        } else {
            return $this->redirect(['action' => 'address']);
        }

        if ($this->request->is('post')) {

            $data = $this->request->getData();
            $_temp = $this->Users->findByEmail($data['email'])->toArray();
            $this->log(sizeof($_temp),'debug');
            if (sizeof($_temp) > 0) {
                $this->Flash->error(__('this email is ready to used.'));
            } else {
                //$this->Log->logDebug($data);
                if ($this->createBookingUser($data)) {
                    $this->Log->logDebug('go to confirm');
                    return $this->redirect(['action' => 'confirm']);
                } else {
                    $this->Log->logDebug($data, 'can not save user');
                }
            }
        }

        $areaLatLongs = Configure::read('SERVICE_AREAS');
        $lat = $areaLatLongs['Samui']['lat'];
        $long = $areaLatLongs['Samui']['long'];
        $this->set('lat', $lat);
        $this->set('long', $long);

        $provinces = $this->CAddresses->CProvinces->find('list', ['conditions' => ['id' => '67']]);

        $this->set('provinces', $provinces);
    }

    public function confirm() {
        if ($this->request->is('post')) {
            $payment_id = $this->createBooking();
            if (!is_null($payment_id)) {
                return $this->redirect(['controller' => 'payments', 'action' => 'pay', $payment_id]);
            }
        }

        $booking = $this->packageVerify();
        $user = $this->Users->get($booking['user_id'], ['contain' => ['CAddresses' => ['CProvinces']]]);
        $this->set('booking', $booking);
        $this->set('user', $user);
    }

    /*
     * Use when user is not member
     */

    private function createBookingUser($data = null) {
        if (is_null($data)) {
            return false;
        }
        $this->Log->logDebug('Create booking user');
        $user = $this->Users->newEntity();
        $user = $this->Users->patchEntity($user, $data);
        $user->username = $this->UserUtils->makeUsername($user);
        $user->isactive = 'Y';
        $user->usertype = M_USER_TYPE_MEMBER;
        $password = $this->Utils->generateRandomString(10);
        $user->password = $password;

        if ($this->Users->save($user)) {
            $this->Sendemail->userRegisterWithPassword($user->email, ($user->firstname . ' ' . $user->lastname), $password);
            $this->Log->logDebug('User is created and login');

            $user = $this->Users->get($user->id);
            $this->Auth->setUser($user);
            $address = $this->CAddresses->newEntity();
            $address->address1 = $data['address1'];
            $address->c_province_id = $data['c_province_id'];
            $address->user_id = $user->id;
            $address->seq = 1;

            if (isset($data['latitude']) && $data['longitude'] != '') {
                $address->lat = $data['latitude'];
                $address->long = $data['longitude'];
            }
            //$this->Log->logDebug($address, 'address');
            if ($this->CAddresses->save($address)) {
                $this->request->session()->write($this->SESSION_KEY_BOOKING . '.c_address_id', $address->id);
                $this->Log->logDebug('created address');
                return true;
            } else {
                $this->Log->logDebug($address);
                $this->Log->logDebug('can not create address');
                return false;
            }
        } else {
            $this->Log->logDebug($user->errors());
        }


        return false;
    }

    public function summaryview() {
        $this->viewBuilder()->layout('clean');
        $data = [];
        $bookingData = $this->packageVerify();
        if (!is_null($bookingData)) {
            
        }

        $this->set('bookingData', $bookingData);
    }

    /*
     * Use for verify all info from booking session
     */

    private function packageVerify() {
        //Get App Setting
        $query = $this->Appsettings->find('all');
        $appsetting = $query->first();

        $ses_booking = $this->request->session()->read($this->SESSION_KEY_BOOKING);
        $this->Log->logDebug($ses_booking);

        $booking = [
            'session' => $ses_booking,
            'area' => $ses_booking['area'],
            'user_id' => $this->request->session()->read('Auth.User.id'),
            'c_address_id' => isset($ses_booking['c_address_id']) ? $ses_booking['c_address_id'] : ''
        ];

        $package = $ses_booking['package'];

        //Get Maid
        if (isset($ses_booking['maid_id']) && !is_null($ses_booking['maid_id']) && $ses_booking['maid_id'] != '') {
            $maidData = [];
            $maid = $this->Maids->get($ses_booking['maid_id'], [
                'fields' => ['Maids.id'],
                'contain' => ['Users' => [
                        'fields' => ['Users.fullname_th', 'Users.fullname_en'],
                        'Images' => [
                            'fields' => ['Images.name', 'Images.type', 'Images.path']
                        ]
                    ]]
            ]);

            if (!is_null($maid)) {
                $maidData = [
                    'maid_id' => $maid['id'],
                    'fullname_th' => $maid['user']['fullname_th'],
                    'fullname_en' => $maid['user']['fullname_en'],
                    'image' => [
                        'name' => $maid['user']['image']['name'],
                        'type' => $maid['user']['image']['type'],
                        'path' => $maid['user']['image']['path']
                    ]
                ];
            }
            $booking['maid'] = $maidData;
        }

        if ('S' == $package) {
            $packageName = $this->packages['S'];
            $booking['package_name'] = $packageName;
            $booking['date'] = $this->dateFromDMYToYMD($ses_booking['date']);
            //$time = (round($ses_booking['time'] / 100, 0, PHP_ROUND_HALF_DOWN)) . ':' . ($ses_booking['time'] % 100);
            $time = $ses_booking['time'];
            $booking['time'] = $time;
            $hour = $ses_booking['hour'] / 100;
            $booking['hour'] = $hour;
            $booking['total_amount'] = $appsetting['price_per_hour'] * $hour;
            $booking['ismonthly'] = 'N';
        } elseif ('HR' == $package) {
            $packageName = $this->packages['HR'];
            $booking['package_name'] = $packageName;
            $booking['ismonthly'] = 'Y';
            $booking['total_amount'] = 6500;
        } elseif('M'==$package) {
            $packageName = $this->packages['M'];
            $booking['package_name'] = $packageName;
            $hour = $ses_booking['hour'] / 100;
            $booking['hour'] = $hour;
            $booking['ismonthly'] = 'Y';
            $booking['start_date'] = $this->dateFromDMYToYMD($ses_booking['start_date']);
            $booking['service_per_week'] = $ses_booking['service'];
            $booking['service_days'] = $ses_booking['day'];
            $booking['total_amount'] = $appsetting['price_per_hour'] * ($hour+$ses_booking['service']);
        }
        $this->Log->logDebug($booking);
        return $booking;
    }

    private function dateFromDMYToYMD($strDate = null) {
        if (is_null($strDate)) {
            return null;
        }
        $splArr = explode('-', $strDate);
        if (sizeof($splArr) != 3) {
            return null;
        }
        $strNewDate = $splArr[2] . '-' . $splArr[1] . '-' . $splArr[0];
        return $strNewDate;
    }

    private function createBooking() {
        $bookingData = $this->packageVerify();
        if (is_null($bookingData)) {
            return null;
        }


        $BookingsModel = TableRegistry::get('Bookings');
        $booking = $BookingsModel->newEntity();

        if (isset($bookingData['date']) && $bookingData['date'] != null && $bookingData['date'] != '') {
            $date = new Date($bookingData['date']);
            $booking->date = $date;
        }
        if (isset($bookingData['time']) && $bookingData['time'] != null && $bookingData['time'] != '') {
            $time = $bookingData['time'];
            $booking->time = $time;
        }
        if (isset($bookingData['hour']) && $bookingData['hour'] != null && $bookingData['hour'] != '') {
            $booking->hour = $bookingData['hour'];
        }



        //set data
        //$booking->roomsize = $roomsize;
        $booking->maid_id = $bookingData['maid']['maid_id'];
        $booking->user_id = $bookingData['user_id'];
        $booking->package = $bookingData['package_name'];
        $booking->price = $bookingData['total_amount'];

        //$booking->total_room = $bookingData['room'];
        $booking->service_area = $bookingData['area'];
        $booking->ismonthly = $bookingData['ismonthly'];
        $booking->iscompleted = 'N';
        $booking->status = 'CO';
        $booking->service_type = 'Cleaning Service';
        $booking->bookingno = $this->getBookingNo($bookingData['area']);
        $booking->c_address_id = $bookingData['c_address_id'];

        $result = $BookingsModel->save($booking);
        if ($result) {
            //$this->createSchedule($booking, $bookingData);
            $payment_id = $this->createPayment($booking);
            $this->request->session()->delete($this->SESSION_KEY_BOOKING);
            
            
            //Send email
            $user = $this->Users->get($booking->user_id);
            if(!is_null($user)){
                $this->Sendemail->bookingDetail($user->email,$booking);
                $this->Sendemail->bookingDetailAdmin($booking);
            }
            
            
            return $payment_id;
        } else {
            $this->Log->logDebug($booking->errors());
        }




        return null;
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

    private function createSchedule($booking = null, $bookingData = null) {

        $maidschedulesModel = TableRegistry::get('Maidschedules');
        $sch = $maidschedulesModel->newEntity();
        $sch->maid_id = $booking->maid_id;
        $sch->startdate = $booking->maid_id;
    }

    private function createPayment($booking) {
        $paymentsModel = TableRegistry::get('Payments');

        $payment = $paymentsModel->newEntity();
        $payment->booking_id = $booking->id;
        $payment->amount = $booking['price'];
        $payment->paymentdate = Time::now();
        $payment->status = 'WT';
        $paymentsModel->save($payment);
        return $payment->id;
    }

    private function getBookingNo($city = null) {
        $code = '0000';
        
        $time = Time::now();
        $yearCode = $time->i18nFormat('yy');
        $_code = $yearCode.$code;
        $query = $this->Appsettings->find('all');
        $appsetting = $query->first();
        $nowNo = $appsetting->booking_no_running+1;
        $nowNoSize = strlen((string) $nowNo);
        $_code = substr_replace($_code,$nowNo,6-$nowNoSize);
        
        
        $areaLatLongs = Configure::read('SERVICE_AREA_LATLONG');
        $cityCode = $areaLatLongs[$city]['code'];
        
        $_code  = $cityCode.$_code;
        
        //Update current seq
        $appsetting->booking_no_running = $nowNo;
        $this->Appsettings->save($appsetting);
        /*
        $time = Time::now();
        $code = $time->i18nFormat('yyMMddHHmmss');
        $areaLatLongs = Configure::read('SERVICE_AREA_LATLONG');
        $cityCode = $areaLatLongs[$city]['code'];
         * 
         */

        return $_code;
    }

}
