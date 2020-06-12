<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Adminpayment Controller
 *
 * @property \App\Model\Table\AdminpaymentTable $Adminpayment
 */
class AdminpaymentController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $adminpayment = $this->paginate($this->Adminpayment);

        $this->set(compact('adminpayment'));
        $this->set('_serialize', ['adminpayment']);
    }

    /**
     * View method
     *
     * @param string|null $id Adminpayment id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $adminpayment = $this->Adminpayment->get($id, [
            'contain' => []
        ]);

        $this->set('adminpayment', $adminpayment);
        $this->set('_serialize', ['adminpayment']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adminpayment = $this->Adminpayment->newEntity();
        if ($this->request->is('post')) {
            $adminpayment = $this->Adminpayment->patchEntity($adminpayment, $this->request->getData());
            if ($this->Adminpayment->save($adminpayment)) {
                $this->Flash->success(__('The adminpayment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adminpayment could not be saved. Please, try again.'));
        }
        $this->set(compact('adminpayment'));
        $this->set('_serialize', ['adminpayment']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Adminpayment id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $adminpayment = $this->Adminpayment->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adminpayment = $this->Adminpayment->patchEntity($adminpayment, $this->request->getData());
            if ($this->Adminpayment->save($adminpayment)) {
                $this->Flash->success(__('The adminpayment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adminpayment could not be saved. Please, try again.'));
        }
        $this->set(compact('adminpayment'));
        $this->set('_serialize', ['adminpayment']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Adminpayment id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $adminpayment = $this->Adminpayment->get($id);
        if ($this->Adminpayment->delete($adminpayment)) {
            $this->Flash->success(__('The adminpayment has been deleted.'));
        } else {
            $this->Flash->error(__('The adminpayment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
