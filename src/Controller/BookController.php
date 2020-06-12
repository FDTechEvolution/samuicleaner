<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;

/**
 * Book Controller
 *
 * @property \App\Model\Table\BookTable $Book
 */
class BookController extends AppController {

    public $Maids = null;
    public $Maidschedules = null;
    public $CAddresses = null;
    public $Service = null;
    public $Appsettings = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Maids = TableRegistry::get('Maids');
        $this->CAddresses = TableRegistry::get('CAddresses');
        $this->Maidschedules = TableRegistry::get('Maidschedules');
        $this->Services = TableRegistry::get('Services');
        $this->Appsettings = TableRegistry::get('Appsettings');
    }

    public function index() {

        $maids = [];
        if ($this->request->is('post')) {
            $this->log('Find maid', 'debug');

            $data = $this->request->getData();

            $query = $this->Maids->find('all');
            $query->contain(['Users' => 'Images', 'Comments']);
            $maids = $query->toArray();
        }

        $this->set(compact('maids'));
        $this->set('_serialize', ['maids']);
        $query = $this->Appsettings->find('all');
        $appsetting = $query->first();
        $areas = Configure::read('SERVICE_AREA');
        $services = Configure::read('SERVICE_TYPE');
        $packages = Configure::read('PACKAGE');
        $times = Configure::read('TIME');
        $hours = Configure::read('HOUR');

        $this->set('times', $times);
        $this->set('hours', $hours);
        $this->set('appsetting', $appsetting);
        $this->set('areas', $areas);
        $this->set('services', $services);
        $this->set('packages', $packages);


        $this->log('End', 'debug');
    }

}
