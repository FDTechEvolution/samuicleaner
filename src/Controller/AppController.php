<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\I18n;
use Cake\Core\Configure;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $ActionDeatil = null;

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize() {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        $this->loadComponent('Auth', [
            'loginAction' => [
                'controller' => 'users',
                'action' => 'login'
            ],
            'logoutRedirect' => [
                'controller' => 'users',
                'action' => 'login'
            ],
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email']
                ]
            ]
        ]);

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        $this->loadComponent('Security', ['blackHoleCallback' => 'forceSSL']);
        //$this->loadComponent('Csrf');
    }

    public function forceSSL() {
        
        //return $this->redirect('https://' . env('SERVER_NAME') . $this->request->here);
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event) {
        if (!array_key_exists('_serialize', $this->viewVars) &&
                in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    public function beforeFilter(Event $event) {


        parent::beforeFilter($event);
        $this->Security->requireSecure();
        $this->loadComponent('ForeignExchangeRate');
        $convertionRates = null;
        if(null == $this->request->session()->read('ForeignExchangeRate')){
            $convertionRates = $this->ForeignExchangeRate->getRate();
            $this->request->session()->write('ForeignExchangeRate',$convertionRates);
        }else{
            //$convertionRates = $this->ForeignExchangeRate->getRate();
            $convertionRates = $this->request->session()->read('ForeignExchangeRate');
        }
        //$this->log($convertionRates,'debug');
        $this->set('convertionRates',$convertionRates);

        $this->ActionDeatil = "[C-" . $this->request->params['controller'] . ", A-" . $this->request->params['action'] . "]";
        $this->Auth->allow();

        $lang = Configure::read('Config.language');
        if (null != ($this->request->session()->read('Config.language'))) {
            $lang = $this->request->session()->read('Config.language');
        } else {
            $this->request->session()->write('Config.language', $lang);
        }
        I18n::locale($lang);
        //debug($lang);
    }

}
