<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

class AdminhomeController extends AppController {

    public $Users = null;
    public $Booking = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->viewBuilder()->layout('admin');
        $this->Users = TableRegistry::get('Users');
        $this->Booking = TableRegistry::get('Bookings');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $this->set('bookings',$this->getBooking());
        $this->set('payments',$this->getPayment());
    }

    private function getBooking() {
        $query = $this->Booking->find('all')
                //->where(['Articles.created >' => new DateTime('-10 days')])
                ->contain(['Users', 'Maids','Payments'])
                ->order(['Bookings.bookingno' =>'DESC'])
                ->limit(20);
        return $query->toArray();
    }
    
    private function getPayment() {
        $paymentsModel = TableRegistry::get('Payments');
        $query = $paymentsModel->find('all')
                //->where(['Articles.created >' => new DateTime('-10 days')])
                ->contain(['Bookings'])
                ->where(['Payments.status'=>'CO'])
                ->order(['Payments.created' =>'DESC'])
                ->limit(20);
        return $query->toArray();
    }

}
