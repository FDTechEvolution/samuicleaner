<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
/**
 * Adminsetting Controller
 *
 * @property \App\Model\Table\AdminsettingTable $Adminsetting
 */
class AdminsettingController extends AppController
{

    public $CConfigurations = null;
    public $CEmailsettings = null;
    
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->viewBuilder()->layout('admin');
        $this->CConfigurations = TableRegistry::get('CConfigurations');
        $this->CEmailsettings = TableRegistry::get('CEmailsettings');
        $this->loadComponent('Log');
        $this->loadComponent('Sendemail');
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        
        $email = $this->CEmailsettings->get('0');
        $this->set(compact('email'));
        $this->set('_serialize', ['email']);
   
       
    }
    
    public function email(){
        $email = $this->CEmailsettings->get('0');
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            $email = $this->CEmailsettings->patchEntity($email, $this->request->getData());

            if ($this->CEmailsettings->save($email)) {
                $this->Flash->success(__('The banner has been saved.')); 
            }else{
                $this->Flash->error(__('The banner could not be saved. Please, try again.'));
            }
            return $this->redirect(['action' => 'index']);
            
        }
    }
    
    public function testsendemail(){
        //$this->autoRender = false;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $this->Log->logDebug($data);
            
            $this->Sendemail->testsend($data['to'],'Email testing',$data['message']);
            $this->Flash->success(__('Email is sent.')); 
            return $this->redirect(['action'=>'index']);
        }
    }
}
