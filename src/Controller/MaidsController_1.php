<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Maids Controller
 *
 * @property \App\Model\Table\MaidsTable $Maids
 */
class MaidsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $maids = $this->paginate($this->Maids);

        $this->set(compact('maids'));
        $this->set('_serialize', ['maids']);
    }

    /**
     * View method
     *
     * @param string|null $id Maid id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $maid = $this->Maids->get($id, [
            'contain' => ['Users', 'Comments']
        ]);

        $this->set('maid', $maid);
        $this->set('_serialize', ['maid']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $maid = $this->Maids->newEntity();
        if ($this->request->is('post')) {
            $maid = $this->Maids->patchEntity($maid, $this->request->getData());
            if ($this->Maids->save($maid)) {
                $this->Flash->success(__('The maid has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The maid could not be saved. Please, try again.'));
        }
        $users = $this->Maids->Users->find('list', ['limit' => 200]);
        $this->set(compact('maid', 'users'));
        $this->set('_serialize', ['maid']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Maid id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $maid = $this->Maids->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $maid = $this->Maids->patchEntity($maid, $this->request->getData());
            if ($this->Maids->save($maid)) {
                $this->Flash->success(__('The maid has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The maid could not be saved. Please, try again.'));
        }
        $users = $this->Maids->Users->find('list', ['limit' => 200]);
        $this->set(compact('maid', 'users'));
        $this->set('_serialize', ['maid']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Maid id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $maid = $this->Maids->get($id);
        if ($this->Maids->delete($maid)) {
            $this->Flash->success(__('The maid has been deleted.'));
        } else {
            $this->Flash->error(__('The maid could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
