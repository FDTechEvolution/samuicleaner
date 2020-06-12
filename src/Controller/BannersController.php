<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
/**
 * Banners Controller
 *
 * @property \App\Model\Table\BannersTable $Banners
 */
class BannersController extends AppController {

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->viewBuilder()->layout('admin');
        //$this->Maids = TableRegistry::get('Maids');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Images']
        ];
        $banners = $this->paginate($this->Banners);

        $this->set(compact('banners'));
        $this->set('_serialize', ['banners']);
    }

    
    public function edit($id = null) {
        $banner = $this->Banners->get($id, [
            'contain' => ['Images']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $banner = $this->Banners->patchEntity($banner, $this->request->getData());
            if ($this->Banners->save($banner)) {
                $this->Flash->success(__('The banner has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The banner could not be saved. Please, try again.'));
        }
        $images = $this->Banners->Images->find('list', ['limit' => 200]);
        $this->set(compact('banner', 'images'));
        $this->set('_serialize', ['banner']);
    }

   

}
