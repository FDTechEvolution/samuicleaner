<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Reviews Controller
 *
 * @property \App\Model\Table\ReviewsTable $Reviews
 *
 * @method \App\Model\Entity\Review[] paginate($object = null, array $settings = [])
 */
class ReviewsController extends AppController {

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->viewBuilder()->layout('admin');
        $this->loadComponent('UploadImage');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $q = $this->Reviews->find()
                ->contain(['Images'])
                ->order(['Reviews.created'=>'DESC']);
        $reviews = $q->toArray();

        $this->set(compact('reviews'));
        $this->set('_serialize', ['reviews']);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $review = $this->Reviews->newEntity();
        if ($this->request->is('post')) {
            $review = $this->Reviews->patchEntity($review, $this->request->getData());

            $image_file = $this->request->data['_image'];

            if (isset($image_file) && $image_file != null && $image_file != '') {
                $image_id = $this->UploadImage->upload($image_file, 'review_profile', '', true);
                if (!(is_null($image_id) || $image_id == '')) {
                    $review->image_id = $image_id;
                }
            }

            if ($this->Reviews->save($review)) {
                $this->Flash->success(__('The review has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The review could not be saved. Please, try again.'));
        }
        //$images = $this->Reviews->Images->find('list', ['limit' => 200]);
        $this->set(compact('review'));
        $this->set('_serialize', ['review']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Review id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $review = $this->Reviews->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $review = $this->Reviews->patchEntity($review, $this->request->getData());
            
            $image_file = $this->request->data['_image'];

            if (isset($image_file) && $image_file != null && $image_file != '') {
                $image_id = $this->UploadImage->upload($image_file, 'review_profile', '', true);
                if (!(is_null($image_id) || $image_id == '')) {
                    $review->image_id = $image_id;
                }
            }
            
            if ($this->Reviews->save($review)) {
                $this->Flash->success(__('The review has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The review could not be saved. Please, try again.'));
        }
        
        $this->set(compact('review'));
        $this->set('_serialize', ['review']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Review id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $review = $this->Reviews->get($id);
        if ($this->Reviews->delete($review)) {
            $this->Flash->success(__('The review has been deleted.'));
        } else {
            $this->Flash->error(__('The review could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
