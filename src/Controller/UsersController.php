<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\MailerAwareTrait;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController {

    use MailerAwareTrait;

    public $FB = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->loadComponent('UserUtils');
    }

    public function register() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user = $this->setDefaultInfo($user);

            $password = $this->request->data['password'];
            $confirmPassword = $this->request->data['confirmpassword'];
            if ($this->UserUtils->isConformablePassword($password, $confirmPassword)) {
                //save process
                $result = $this->Users->save($user);
                if ($result) {
                    //$this->Flash->success('');
                    //$this->getMailer('User')->send('welcome_register', [$user]);
                    //Login 
                    $user = $this->Auth->identify();
                    if ($user) {
                        $user = $this->Users->get($user['id'], [
                            'contain' => ['Images']
                        ]);

                        $this->Auth->setUser($user);
                    }

                    return $this->redirect(['controller' => 'success']);
                }

                $this->log($this->ActionDeatil, 'debug');
                $this->log($user->errors(), 'debug');
                $this->Flash->error('');
            }
            $this->Flash->error(__(MSG_ERR_PASSWORD_NOT_MATCH));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function login() {


        if (!(is_null($this->request->session()->read('Auth.User.email')))) {
            return $this->redirect(['controller' => 'home', 'action' => 'index']);
        }



        $this->loadComponent('Recaptcha');
        if ($this->request->is('post')) {

            /*
              if (RECAPTCHA_VAL && !$this->Recaptcha->checkReCaptcha($this->request->data['g-recaptcha-response'])) {
              $this->Flash->error(RECAPTCHA_ERR_MSG);
              return;
              }

             */

            $user = $this->Auth->identify();
            if ($user) {
                $user = $this->Users->get($user['id'], [
                    'contain' => ['Images']
                ]);

                $this->Auth->setUser($user);

                if ($user['usertype'] == M_USER_TYPE_ADMIN) {
                    return $this->redirect(['controller' => 'adminhome', 'action' => 'index']);
                }

                $_temp = $this->request->query('redirect');
                if (is_null($_temp)) {
                    return $this->redirect($this->Auth->redirectUrl());
                } else {
                    return $this->redirect($_temp);
                }
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }

        $this->set('site_key', $this->Recaptcha->site_key);
    }

    public function logout() {
        $this->request->session()->destroy();
        return $this->redirect($this->Auth->logout());
    }

    public function forgot() {
        if ($this->request->is('post')) {
            $email = $this->request->data['email'];
            if (is_null($email) || $email == '') {
                return;
            }

            $query = $this->Users->findByEmail($email);
            $userData = $query->first();
            if ($userData->email != '') {
                $this->loadComponent('Utils');
                $userData->verifycode = $this->Utils->generateRandomString();
                $this->Users->save($userData);
                $this->loadComponent('Sendemail');
                $forgotLink = SITE_URL . 'users/resetpassword/' . $userData['email'] . '/' . $userData['verifycode'];
                $this->Sendemail->userForgotPassword($userData['email'], $forgotLink);
                //$this->getMailer('User')->send('forgot_password', [$userData]);
                return $this->redirect(['controller' => 'home']);
            }
        }
    }

    public function resetpassword($email = null, $verifycode = null) {
        if (is_null($email) || $email == '' || is_null($verifycode) || $verifycode == '') {
            return;
        }

        $query = $this->Users->findByEmailAndVerifycode($email, $verifycode);
        $user = $query->first();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            $password = $this->request->data['password'];
            $confirmPassword = $this->request->data['confirmpassword'];
            if ($this->isConformablePassword($password, $confirmPassword)) {
                $user->verifycode = null;
                if ($this->Users->save($user)) {
                    return $this->redirect(['action' => 'login']);
                }
                $this->Flash->error(__('Password is incorrect'));
            } else {
                $this->Flash->error(__(MSG_ERR_PASSWORD_NOT_MATCH));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function success() {
        
    }

    private function setDefaultInfo($user) {
        $user->username = $this->UserUtils->makeUsername($user);
        $user->isactive = 'Y';
        $user->usertype = M_USER_TYPE_MEMBER;
        return $user;
    }

    public function facebookauthen() {
        $this->autoRender = false;
        $this->log('connected in facebookauthen','debug');
        if ($this->request->is(['post'])) {
            $fbUser = $this->request->getData();
            $this->log($fbUser,'debug');

            $query = $this->Users->findByFacebook($fbUser['id']);
            $user = $query->first();
            //ebug($user);
            $this->log($user, 'debug');

            if (!isset($user['id'])) {
                //debug($fbUser);
                $this->log($fbUser, 'debug');
                $user = $this->Users->newEntity();

                $user->username = $fbUser['name'];
                $user->password = $fbUser['id'];
                $user->firstname = $fbUser['first_name'];
                $user->lastname = $fbUser['last_name'];
                $user->email = $fbUser['email'];
                $user->isactive = 'Y';
                $user->usertype = M_USER_TYPE_MEMBER;
                $user->facebook = $fbUser['id'];
                $strPicture = "https://graph.facebook.com/" . $fbUser['id'] . "/picture?type=large";
                $user->profile_image = $strPicture;
                $result = $this->Users->save($user);
                if(!$result){
                    $this->log($user->errors(),'debug');
                }
            }
            $this->authen($user->id);
        }
    }

    private function authen($id = null) {
        $this->log('authen:  ' . $id, 'debug');
        if (is_null($id)) {
            return $this->redirect(['controller' => 'users', 'action' => 'login']);
        }
        $user = $this->Users->get($id, [
            'contain' => ['Images']
        ]);
        $this->Auth->setUser($user);
        /*
        $_temp = $this->request->query('redirect');
        if (is_null($_temp)) {
            return $this->redirect($this->Auth->redirectUrl());
        } else {
            return $this->redirect($_temp);
        }
         * 
         */
    }

}
