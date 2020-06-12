<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\I18n\Date;
use Cake\Cache\Cache;
/**
 * Adminmaid Controller
 *
 * @property \App\Model\Table\AdminmaidTable $Adminmaid
 */
class AdminmaidController extends AppController {

    public $Maids = null;
    public $Users = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->viewBuilder()->layout('admin');
        $this->Maids = TableRegistry::get('Maids');
        $this->Users = TableRegistry::get('Users');
        $this->loadComponent('UserUtils');
        Cache::clear(false);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $query = $this->Maids->find('all', ['contain' => ['Users' => 'Images']]);
        $maids = $query->toArray();
        $this->set(compact('maids'));
        $this->set('_serialize', ['maids']);
    }

    public function edit($id = null) {
        $maid = $this->Maids->get($id, [
            'contain' => ['Users' => ['Images', 'CAddresses']]
        ]);
        $user_id = $maid['user']['id'];
        $c_address_id = $maid['user']['c_addresses'][0]['id'];
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            //debug($data);
            $strDate = ($data['birthday_year'] + START_YEAR) . '-' . $data['birthday_month'] . '-' . $data['birthday_day'];
            $date = new Date($strDate);
            $data['user']['birthday'] = $date;

            //Address
            $map_position = $data['position'];
            $map_position = str_replace('(', '', $map_position);
            $map_position = str_replace(')', '', $map_position);

            $map_position = explode(',', $map_position);
            
            if (sizeof($map_position) == 2) {
               
                $address = $this->Maids->Users->CAddresses->get($c_address_id);
                $address->lat = $map_position[0];
                $address->long = $map_position[1];
                $address->address1 = $data['user']['c_addresses'][0]['address1'];
                $this->Maids->Users->CAddresses->save($address);
            }

            $maid = $this->Maids->patchEntity($maid, $data);

            

            if ($this->Maids->save($maid)) {
                $this->Flash->success(__('The maid has been saved.'));

                //return $this->redirect(['controller' => 'adminmaid', 'action' => 'index']);
            } else {
                $this->Flash->error(__('The maid could not be saved. Please, try again.'));
            }
            
            
        }

        $birthday_day = 1;
        $birthday_month = 1;
        $birthday_year = 0;
        if ($maid->user->birthday != null && $maid->user->birthday != '') {
            $date = $maid->user->birthday;
            $birthday_day = $date->day;
            $birthday_month = $date->month;
            $birthday_year = $date->year - START_YEAR;
        }
        $this->set('birthday_day', $birthday_day);
        $this->set('birthday_month', $birthday_month);
        $this->set('birthday_year', $birthday_year);

        $monthEN = Configure::read('MONTH_EN');
        $monthTH = Configure::read('MONTH_TH');
        $dayNo = Configure::read('DAYS');
        $this->set('monthEN', $monthEN);
        $this->set('monthTH', $monthTH);
        $this->set('dayNo', $dayNo);
        $years = [];
        for ($i = START_YEAR; $i < 2018; $i++) {
            array_push($years, $i);
        }
        $this->set('years', $years);
        $days = Configure::read('DAY_OF_WEEK');
        $this->set('days', $days);
        $this->set(compact('maid'));
        $this->set('_serialize', ['maid']);
    }

    public function changepassword($id = null, $user_id = null) {
        if (is_null($id) || $id == '') {
            return $this->redirect(['action' => 'edit', $id]);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->get($user_id);
            $user = $this->Users->patchEntity($user, $this->request->data);
            $password = $this->request->data['password'];
            $confirmPassword = $this->request->data['confirmpassword'];
            if ($this->UserUtils->isConformablePassword($password, $confirmPassword)) {

                $this->Users->save($user);
                $this->Flash->success(__('Password is changed.'));
                //debug($user);
            } else {
                $this->Flash->error(__(MSG_ERR_PASSWORD_NOT_MATCH));
            }
            return $this->redirect(['action' => 'edit', $id]);
        }
    }

    public function changeprofile($id = null, $user_id = null) {
        if (is_null($id) || $id == '') {
            return $this->redirect(['action' => 'edit', $id]);
        }
        $this->loadComponent('UploadImage');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $image_file = $this->request->data['image'];
            $image_id = $this->UploadImage->upload($image_file, 'profile', '', true);
            if (!(is_null($image_id) || $image_id == '')) {
                $user = $this->Users->get($user_id);
                $user->image_id = $image_id;
                $this->Users->save($user);
                $this->Flash->success(__('Change image profile success.'));
                return $this->redirect(['action' => 'edit', $id]);
            }
        }
    }

    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $maid = $this->Maids->get($id);
        if ($this->Maids->delete($maid)) {
            $this->Flash->success(__('The maid has been deleted.'));
        } else {
            $this->Flash->error(__('The maid could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function approve($id = null) {
        if (is_null($id) || $id == '') {
            $this->Flash->error(MSG_ERR_SOMETHINGWRONG);
            return $this->redirect(['action' => 'index']);
        }
        $maid = $this->Maids->get($id);
        $maid->isapproved = 'Y';
        $maid->isactive = 'Y';
        $this->Maids->save($maid);
        $this->Flash->success(__('The maid has been saved.'));

        return $this->redirect(['action' => 'index']);
    }

    public function setoffline($id = null) {
        if (is_null($id) || $id == '') {
            $this->Flash->error(MSG_ERR_SOMETHINGWRONG);
            return $this->redirect(['action' => 'index']);
        }
        $maid = $this->Maids->get($id);
        $maid->isactive = 'N';
        $this->Maids->save($maid);
        $this->Flash->success(__('The maid has been saved.'));

        return $this->redirect(['action' => 'index']);
    }

    public function setonline($id = null) {
        if (is_null($id) || $id == '') {
            $this->Flash->error(MSG_ERR_SOMETHINGWRONG);
            return $this->redirect(['action' => 'index']);
        }
        $maid = $this->Maids->get($id);
        $maid->isactive = 'Y';
        $this->Maids->save($maid);
        $this->Flash->success(__('The maid has been saved.'));

        return $this->redirect(['action' => 'index']);
    }

}
