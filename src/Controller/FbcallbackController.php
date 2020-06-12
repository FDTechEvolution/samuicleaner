<?php

namespace App\Controller;

use App\Controller\AppController;
use Facebook;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
/**
 * Fbcallback Controller
 *
 * @property \App\Model\Table\FbcallbackTable $Fbcallback
 */
class FbcallbackController extends AppController {

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

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $helper = $this->FB->getRedirectLoginHelper();
        if (isset($_GET['state'])) {
            $helper->getPersistentDataHandler()->set('state', $_GET['state']);
        }

        $user = [];
        try {
            $accessToken = $helper->getAccessToken();
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        if (isset($accessToken)) {
            // Logged in!
            $_SESSION['facebook_access_token'] = (string) $accessToken;

            // Now you can redirect to another page and use the
            // access token from $_SESSION['facebook_access_token']

            $response = $this->FB->get('/me?fields=id,name,gender,email,link', $accessToken);

            $user = $response->getGraphUser();

            //echo 'ID: ' . $user['id'];
            //echo 'Name: ' . $user['name'];
            //echo 'Gener: ' . $user['gener'];
            //echo 'Email: ' . $user['email'];
            //echo 'Link: ' . $user['link'];
            $this->userManagement($user);
        }

        //$this->set('fb_user', $user);
    }

    private function userManagement($fbUser=null){
        $user = $this->Users->findByFacebook($fbUser['id']);

        if(is_null($user)){

        }else{
            $this->Auth->setUser($user->toArray());
                return $this->redirect([
                    'controller' => 'Users',
                    'action' => 'home'
                    ]);
        }
    }

}
