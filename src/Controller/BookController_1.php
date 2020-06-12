<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\I18n\Date;
use Cake\I18n\Time;

/**
 * Book Controller
 *
 * @property \App\Model\Table\BookTable $Book
 */
class BookController extends AppController {
    
    public $TIME_OPT = [
        7.5=>'07:30',
        8=>'08:00',
        8.5=>'08:30',
        9=>'09:00',
        9.5=>'09:30',
        10=>'10:00',
        10.5=>'10:30',
        11=>'11:00',
        11.5=>'11:30',
        12=>'12:00',
        12.5=>'12:30',
        13=>'13:00',
        13.5=>'13:30',
        14=>'14:00',
        14.5=>'14:30',
        15=>'15:00',
        15.5=>'15:30',
        16=>'16:00',
        16.5=>'16:30',
        17=>'17:00',
        17.5=>'17:30',
        18=>'18:00',
        18.5=>'18:30',
        19=>'19:00',
        19.5=>'19:30',
        20=>'20:00',
        20.5=>'20:30',
        21=>'21:00',
        21.5=>'21:30'];
    public $SIZE_OPT = [
        40=>'40',60=>'60',70=>'70',80=>'80',90=>'90',100=>'100'
    ];

    public $PACKAGE = [
        ['size'=>40,'room'=>1,'hour'=>2,'singleprice'=>400,'oneweekprice'=>1710,'twiceweekprice'=>3240],
        ['size'=>60,'room'=>1,'hour'=>2.5,'singleprice'=>500,'oneweekprice'=>2850,'twiceweekprice'=>5400],
        ['size'=>70,'room'=>2,'hour'=>3,'singleprice'=>600,'oneweekprice'=>3420,'twiceweekprice'=>6480],
        ['size'=>80,'room'=>3,'hour'=>3.5,'singleprice'=>700,'oneweekprice'=>3990,'twiceweekprice'=>7560],
        ['size'=>90,'room'=>4,'hour'=>4,'singleprice'=>800,'oneweekprice'=>4560,'twiceweekprice'=>8640],
        ['size'=>100,'room'=>5,'hour'=>5,'singleprice'=>1000,'oneweekprice'=>5130,'twiceweekprice'=>9720],
    ];
    
    public $Maids= NULL;
    public $Bookings= NULL;
    
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Maids = TableRegistry::get('Maids');
        $this->Bookings = TableRegistry::get('Bookings');
    }
    
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $this->viewBuilder()->layout('default_blank');
        
        $this->paginate = [
            'contain' => ['Users'=>['Images']]
        ];
        $maids = $this->paginate($this->Maids);

        $booking = $this->Bookings->newEntity();
        if ($this->request->is('post')) {
            //debug($this->request->data);

            $user_id = $this->request->session()->read('Auth.User.id');

            $date = new Date($this->request->data['strdate']);
            $time = $this->request->data['strtime'];
            $booking->date = $date;

            $booking->time = $this->TIME_OPT[$time].':00';
            
            $booking->maid_id = $this->request->data['maid_id'];
            $booking->user_id = $user_id;
            
            $package = $this->request->data['package'];
            $roomsize = $this->request->data['size'];
            $price = 0; 

            foreach ($this->PACKAGE as $key) {
                if($roomsize ==$key['size']){
                    if($package =='A'){
                        $price = $key['singleprice'];
                    }elseif($package =='B'){
                        $price = $key['oneweekprice'];
                    }else{
                        $price = $key['twiceweekprice'];
                    }
                    break;
                }
            }
            
            $booking->roomsize = $roomsize;
            $booking->package = $package;
            $booking->price = $price;
            $booking->status = 'WT';
            $booking->ismonthly = $booking->package=='A'?'N':'Y';
            if($this->Bookings->save($booking)){
                $this->Flash->success(__('Booking is completed.'));
                return $this->redirect(['controller'=>'payments','action' => 'pay',$booking->id]);
            }
            $this->Flash->error(__('The booking not be saved. Please, try again.'));

        }

        $this->set(compact('maids'));
        $this->set('_serialize', ['maids','booking']);
        $this->set('timeoption',$this->TIME_OPT);
        $this->set('sizeoption',$this->SIZE_OPT);
    }

    public function payment($booking_id = null){
        if(is_null($booking_id)|| $booking_id==''){
            return $this->redirect(['action' => 'index']);
        }

    }

    public function mybooking(){
        $this->viewBuilder()->setLayout('account');
        $this->Bookings = TableRegistry::get('Bookings');

        $user_id = $this->request->session()->read('Auth.User.id');
        $query = $this->Bookings->find()
                                ->contain(['Maids'=>['Users']])
                                ->where(['Bookings.user_id'=>$user_id]);
        $bookingData = $query->toArray();
        $this->set('bookingData',$bookingData);
    }

    public function detail($booking_id = null){

    }

    public function jquerygetpackage($strDate,$strTime,$roomSize){
        $this->autoRender  = false;
        $this->log($strDate, 'debug');
        $this->log($strTime, 'debug');
        $this->log($roomSize, 'debug');

        $arr = [];
        foreach ($this->PACKAGE as $key) {
            if($roomSize == $key['size']){
                $this->log($key, 'debug');
                $arr = $key;
            }
           
        }
        echo json_encode($arr);
    }

}
