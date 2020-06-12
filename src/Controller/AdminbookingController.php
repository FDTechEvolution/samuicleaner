<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Cache\Cache;
/**
 * Adminbooking Controller
 *
 * @property \App\Model\Table\AdminbookingTable $Adminbooking
 */
class AdminbookingController extends AppController {

    public $Bookings = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->viewBuilder()->layout('admin');
        $this->Bookings = TableRegistry::get('Bookings');
        Cache::clear(false);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Users', 'Maids'],
            'maxLimit'=>PAGE_LiMIT,
            'order'=>['Bookings.bookingno'=>'DESC']
        ];
        $bookings = $this->paginate($this->Bookings);

        $this->set(compact('bookings'));
        $this->set('_serialize', ['bookings']);
    }
    
    public function view($id = null){
        $q = $this->Bookings->find()
                ->contain(['Users','Maids'=>['Users'],'CAddresses','Payments'])
                ->where(['Bookings.id'=>$id]);
        if(sizeof($q->toArray()) >0){
            $booking = $q->first();
            $this->set(compact('booking'));
        }else{
            return $this->redirect(['action'=>'index']);
        }
    }
        

}
