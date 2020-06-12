<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\MailerAwareTrait;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\I18n\Date;
use Cake\I18n\Time;

/**
 * Maids Controller
 *
 * @property \App\Model\Table\MaidsTable $Maids
 */
class MaidsController extends AppController {

    use MailerAwareTrait;

    public $Users = null;
    public $Comments = null;
    private $MSG_ERR_PASSWORD_NOT_MATCH = "Your password and confirmation password do not match.";

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->loadComponent('UserUtils');
        $this->Users = TableRegistry::get('Users');
        $this->Comments = TableRegistry::get('Comments');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        return $this->redirect(['action' => 'register']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function register() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            
            //Set user
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->username = $this->UserUtils->makeUsername($user);
            $user->firstname = $user['fullname_th'];
            $user->lastname = $user['fullname_th'];
            $user->isactive = 'Y';
            $user->usertype = M_USER_TYPE_MAID;

            $password = $this->request->data['password'];
            $confirmPassword = $this->request->data['confirmpassword'];
            $strDate = ($this->request->data['birthday_year'] + START_YEAR) . '-' . $this->request->data['birthday_month'] . '-' . $this->request->data['birthday_day'];
            $date = new Date($strDate);
            $user->birthday = $date;

            if ($this->UserUtils->isConformablePassword($password, $confirmPassword)) {
                //save process
                //$user = $this->setDefaultInfo($user);
                $result = $this->Users->save($user);
                if ($result) {
                    $maidResult = $this->createMaidWithUser($this->request->data['Maids'], $user->id);
                    $addressResult = $this->createLocation($this->request->data['Maids'], $user->id);
                    //$this->getMailer('User')->send('register_maid_success', [$user]);
                    if ($maidResult && $addressResult) {
                        $this->Flash->success(__('Maid register is success.'));
                        return $this->redirect(['controller' => 'success', 'action' => 'index']);
                    }
                } else {
                    $this->log($this->ActionDeatil, 'debug');
                    $this->log($user->errors(), 'debug');
                    $this->Flash->error(__($this->MSG_SAVE_ERROR));
                }
            } else {
                $this->Flash->error(__($this->MSG_ERR_PASSWORD_NOT_MATCH));
            }
        }

        $areaLatLongs = Configure::read('SERVICE_AREAS');
        $lat = $areaLatLongs['Samui']['lat'];
        $long = $areaLatLongs['Samui']['long'];
        $this->set('lat', $lat);
        $this->set('long', $long);
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

        $this->set(compact('user'));
        $this->set('days', $days);
        $this->set('_serialize', ['user']);
    }

    private function createLocation($data, $user_id = null) {
        $cAddressesModel = TableRegistry::get('CAddresses');
        $map_position = $data['position'];
        $map_position = str_replace('(', '', $map_position);
        $map_position = str_replace(')', '', $map_position);

        $map_position = explode(',', $map_position);

        $address = $cAddressesModel->newEntity();
        if (sizeof($map_position) == 2) {
            $address->lat = $map_position[0];
            $address->long = $map_position[1];
        }
        $address->address1 = "Maid address";
        $address->c_province_id = 67;
        $address->user_id = $user_id;
        $address->seq = 1;

        if ($cAddressesModel->save($address)) {
            return true;
        }
        $this->Flash->error("Maid address can't be save.");
        return false;
    }

    private function createMaidWithUser($maidData = null, $user_id = null) {
        //debug($maidData);
        $maid = $this->Maids->newEntity();
        $maid = $this->Maids->patchEntity($maid, $maidData);
        $maid->introduce_en = $maidData['introduce'];
        $maid->user_id = $user_id;

        $days = Configure::read('DAY_OF_WEEK');
        $workdays = [];
        foreach ($days as $d):
            $v = $maidData['work_day_' . $d];
            if ($v != '0' && $v != '') {
                array_push($workdays, $v);
            }

        endforeach;

        $free_day = implode(",", $workdays);
        $free_day = str_replace("0,", "", $free_day);
        $free_day = str_replace(",0", "", $free_day);

        $maid->free_day = $free_day;
        if ($this->Maids->save($maid)) {
            //$this->Flash->success(__('The maid has been saved.'));
            return true;
        }
        $this->Flash->error("Maid can't be save.");
        return false;
    }

    public function view($id = null) {
        if (!is_null($id)) {
            $maid = $this->Maids->get($id, ['contain' => ['Comments' => ['Users'], 'Users' => ['Images']]]);


            $this->set('maid', $maid);
        }
    }

    public function regissuccess($user = null) {
        if ($user != null) {
            $this->getMailer('User')->send('register_maid_success', [$user]);
        }
    }

    public function comment($id = null) {
        if (!is_null($id)) {
            if ($this->request->is(['patch', 'post', 'put'])) {
                $comment = $this->Comments->newEntity();
                $data = $this->request->getData();
                $data['maid_id'] = $id;
                $data['user_id'] = $this->request->session()->read('Auth.User.id');

                $comment = $this->Comments->patchEntity($comment, $data);
                $this->Comments->save($comment);
            }


            $this->Flash->success(__('Comment is success.'));
            return $this->redirect(['controller' => 'maids', 'action' => 'view', $id]);
        }
    }
    
    public function checkemaildup(){
        $this->autoRender = false;
        
        if($this->request->is('post')){
            $data = $this->request->getData();
            $q = $this->Users->find()
                    ->where(['email'=>$data['email']]);
            $count = $q->count();
            if($count>0){
                echo 'error';
            }else{
                echo 'ok';
            }
        }
        
    }

}
