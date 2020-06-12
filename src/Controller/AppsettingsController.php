<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
/**
 * Appsettings Controller
 *
 * @property \App\Model\Table\AppsettingsTable $Appsettings
 */
class AppsettingsController extends AppController {

    public $Service = null;
    
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->viewBuilder()->layout('admin');
        $this->Services = TableRegistry::get('Services');
    }



    /**
     * View method
     *
     * @param string|null $id Appsetting id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /*
    public function view($id = null) {
        $appsetting = $this->Appsettings->get($id, [
            'contain' => []
        ]);

        $this->set('appsetting', $appsetting);
        $this->set('_serialize', ['appsetting']);
    }
     * 
     */

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    
    
    /*
    public function add() {
        $appsetting = $this->Appsettings->newEntity();
        if ($this->request->is('post')) {
            $appsetting = $this->Appsettings->patchEntity($appsetting, $this->request->getData());
            if ($this->Appsettings->save($appsetting)) {
                $this->Flash->success(__('The appsetting has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The appsetting could not be saved. Please, try again.'));
        }
        $this->set(compact('appsetting'));
        $this->set('_serialize', ['appsetting']);
    }
     
     */

    /**
     * Edit method
     *
     * @param string|null $id Appsetting id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function index() {
        $query = $this->Appsettings->find('all');
        $appsetting = $query->first();
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appsetting = $this->Appsettings->patchEntity($appsetting, $this->request->getData());
            if ($this->Appsettings->save($appsetting)) {
                $this->Flash->success(__('The appsetting has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The appsetting could not be saved. Please, try again.'));
        }
        $this->set(compact('appsetting'));
        $this->set('_serialize', ['appsetting']);
        
        
        $query = $this->Services->find('all', [
            'conditions' => ['Services.type' => 'Add-ons'],
            'order' => ['seq' => 'ASC']
        ]);

        $addons = $query->toArray();
        $this->set('addons', $addons);
    }

   

}
