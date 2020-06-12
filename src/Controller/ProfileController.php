<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;
use Cake\Core\Configure;

class ProfileController extends AppController {

    public $Users = null;
    public $userData = null;
    public $Bookings = null;
    private $MSG_ERR_PASSWORD_NOT_MATCH = "Your password and confirmation password do not match.";

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->loadComponent('UserUtils');
        //$this->viewBuilder()->setLayout('account');

        $this->Users = TableRegistry::get('Users');
        $user_id = $this->request->session()->read('Auth.User.id');
        if (is_null($user_id) || $user_id == '') {
            return $this->redirect(['controller' => 'users', 'action' => 'login']);
        }

        $this->userData = $this->Users->get($user_id, ['contain' => ['Maids', 'Images', 'Bookings' => ['Payments', 'Maids' => ['Users']]]]);
        if (is_null($this->userData)) {
            return $this->redirect(['controller' => 'users', 'action' => 'login']);
        }
        $this->set('user', $this->userData);
        $this->set('isMaid', sizeof($this->userData->maids) != 0);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        //$this->set('x','hi');
        //debug($this->userData);
    }

    public function edit($id = null) {
        $user = $this->Users->get($id, [
            'contain' => ['Maids', 'Images', 'CAddresses']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $data = $this->request->getData();
            //debug($data);
            //update user
            $strDate = ($data['birthday_year'] + START_YEAR) . '-' . $data['birthday_month'] . '-' . $data['birthday_day'];
            $date = new Date($strDate);
            $user->birthday = $date;

            if ($this->request->data['xpassword'] != '') {
                $password = $this->request->data['password'];
                $confirmPassword = $this->request->data['confirmpassword'];
                if ($this->UserUtils->isConformablePassword($password, $confirmPassword)) {
                    $user->password = $this->request->data['password'];
                }
                $this->Flash->error(__($this->MSG_ERR_PASSWORD_NOT_MATCH));
            }

            if ($this->Users->save($user)) {
                if ($this->Users->Maids->save($user['maids'][0])) {
                    $this->Flash->success('');
                    return $this->redirect(['action' => 'index']);
                }
            }

            $this->Flash->error('');
        }

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


        //extract birthday
        if (!is_null($user->birthday)) {
            $date = $user->birthday;
            $user->birthday_year = $date->year - START_YEAR; // 2014
            $user->birthday_month = $date->month; // 5
            $user->birthday_day = $date->day; // 10
        }


        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function changepassword($id = null) {
        
    }

    public function changeimage($id = null) {
        if (is_null($id) || $id == '') {
            return $this->redirect(['action' => 'index']);
        }
        $this->loadComponent('UploadImage');
        if ($this->request->is('post')) {
            $image_file = $this->request->data['image'];
            $image_id = $this->UploadImage->upload($image_file, 'profile', '', true);
            if (!(is_null($image_id) || $image_id == '')) {
                $this->userData->image_id = $image_id;
                $this->Users->save($this->userData);
                return $this->redirect(['action' => 'index']);
            }
        }
    }

}
