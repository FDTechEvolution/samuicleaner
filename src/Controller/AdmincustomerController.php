<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Cache\Cache;
/**
 * Admincustomer Controller
 *
 * @property \App\Model\Table\AdmincustomerTable $Admincustomer
 */
class AdmincustomerController extends AppController {

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->viewBuilder()->layout('admin');
        $this->Users = TableRegistry::get('Users');
        Cache::clear(false);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
       
        $query = $this->Users->find()
                ->contain(['Images','Maids'])
                ->where(['Users.usertype'=>M_USER_TYPE_MEMBER]);
        
        $customer = $query->toArray();
        $this->set(compact('customer'));
        //$this->set('_serialize', ['customer']);
    }

    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The customer has been deleted.'));
            
        } else {
            $this->Flash->error(__('The customer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
