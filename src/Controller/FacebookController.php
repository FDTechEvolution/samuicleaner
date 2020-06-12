<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Facebook;
use Cake\ORM\TableRegistry;

/**
 * Facebook Controller
 *
 * @property \App\Model\Table\FacebookTable $Facebook
 */
class FacebookController extends AppController {

    public $FB = null;
    public $Users = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        $this->Users = TableRegistry::get('Users');

        $this->FB = new Facebook\Facebook([
            'app_id' => '1692496891046330', // Replace {app-id} with your app id
            'app_secret' => 'cebad084fc4fd40542b963bdac581196',
            'default_graph_version' => 'v2.8',
        ]);
    }

    public function login() {
        $action = $this->request->query('a');
        $controller = $this->request->query('c');
        if(!(is_null($controller) || $controller =='' || is_null($action) || $action =='')){
            $this->request->session()->write('Callback.url.action', $action);
            $this->request->session()->write('Callback.url.controller', $controller);
        }
        $loginUrl = $this->getLoginUrl();
        $this->redirect($loginUrl);
    }

    public function callback() {
        $helper = $this->FB->getRedirectLoginHelper();
        $helper->getPersistentDataHandler()->set('state', $_GET['state']);
        try {
            $accessToken = $helper->getAccessToken();
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            //cho 'Graph returned an error: ' . $e->getMessage();
            $this->log('Graph returned an error: ' . $e->getMessage(), 'debug');
            return $this->redirect(['controller' => 'users', 'action' => 'login']);
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            $this->log('Facebook SDK returned an error:  ' . $e->getMessage(), 'debug');
            return $this->redirect(['controller' => 'users', 'action' => 'login']);
        }

        if (isset($accessToken)) {
            // Logged in!
            $_SESSION['facebook_access_token'] = (string) $accessToken;
            $this->log('Facebook Logged in accessToken:  ' . (string) $accessToken, 'debug');
            // Now you can redirect to another page and use the
            // access token from $_SESSION['facebook_access_token']

            $response = $this->FB->get('/me?fields=id,name,gender,email,link', $accessToken);

            $fbUser = $response->getGraphUser();

            //echo 'ID: ' . $user['id'];
            //echo 'Name: ' . $user['name'];
            //echo 'Gener: ' . $user['gener'];
            //echo 'Email: ' . $user['email'];
            //echo 'Link: ' . $user['link'];

            $query = $this->Users->findByFacebook($fbUser['id']);
            $user = $query->first();
            //ebug($user);
            //$this->log('User data:  ' .implode(", ", $user) , 'debug');

            if (!isset($user['id'])) {
                //debug($fbUser);
                $this->log('New user:  ' . implode(", ", $fbUser), 'debug');
                $user = $this->Users->newEntity();

                $user->username = $fbUser['name'];
                $user->password = $fbUser['id'];
                $user->firstname = $fbUser['name'];
                $user->lastname = $fbUser['name'];
                $user->email = $fbUser['email'];
                $user->isactive = 'Y';
                $user->usertype = M_USER_TYPE_MEMBER;
                $user->facebook = $fbUser['id'];
                $strPicture = "https://graph.facebook.com/" . $fbUser['id'] . "/picture?type=large";
                $user->profile_image = $strPicture;
                $this->Users->save($user);
            }
            //debug($user);
            $this->authen($user->id);
        } else {
            $this->log('Facebook Logg in fail', 'debug');
            return $this->redirect(['controller' => 'users', 'action' => 'login']);
        }
    }

    public function authen($id = null) {
        $this->log('authen:  ' . $id, 'debug');
        if (is_null($id)) {
            return $this->redirect(['controller' => 'users', 'action' => 'login']);
        }
        $user = $this->Users->get($id, [
            'contain' => ['Images']
        ]);
        $this->Auth->setUser($user);
        if(null !=($this->request->session()->read('Callback.url.controller')) && null !=($this->request->session()->read('Callback.url.action'))){
            $c = $this->request->session()->read('Callback.url.controller');
            $a = $this->request->session()->read('Callback.url.action');
            $this->request->session()->delete('Callback');
            return $this->redirect(['controller'=>$c,'action'=>$a]);
        }else{
            return $this->redirect($this->Auth->redirectUrl());
        }
        
    }

    private function getLoginUrl() {
        $helper = $this->FB->getRedirectLoginHelper();
        $permissions = ['email', 'user_likes']; // optional
        //$loginUrl = $helper->getLoginUrl('https://www.samuicleaner.com/facebook/callback/', $permissions);
        $loginUrl = $helper->getLoginUrl('https://www.samuicleaner.com/facebook/callback/', $permissions);

        return $loginUrl;
    }

}
