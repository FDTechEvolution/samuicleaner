<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
/**
 * Home Controller
 *
 * @property \App\Model\Table\HomeTable $Home
 */
class HomeController extends AppController {

    public $Maids = null;
    public $Customers = null;
    public $Reviews = null;
    
    
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Maids = TableRegistry::get('Maids');
        $this->Customers = TableRegistry::get('Customers');
        $this->Reviews = TableRegistry::get('Reviews');
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
       //$this->viewBuilder()->layout('home');
        $areaLatLongs = Configure::read('SERVICE_AREA_LATLONG');
        $lat = $areaLatLongs['Samui']['lat'];
        $long = $areaLatLongs['Samui']['long'];

        $query = $this->Maids->find('all',[
            'contain'=>['Users'=>['Images']],
            'conditions'=>['Maids.isapproved'=>'Y'],
            'order'=>['Maids.created'=>'DESC'],
            'limit'=>6]);
        $maids =$query->toArray();
        
        $query = $this->Customers->find('all',[
            'contain'=>['Images']
        ]);
        $customers =$query->toArray();

        //get review
        $q = $this->Reviews->find()
                ->contain(['Images'])
                ->order(['Reviews.created'=>'DESC']);
        $reviews = $q->toArray();
        
        $this->set(compact('reviews','maids','customers','lat','long'));

        $this->set('maidMaps',$this->getMaidWithMap());
    }
    
    private function getMaidWithMap(){
        $query = $this->Maids->find('all',[
            'contain'=>['Users'=>['Images','CAddresses']]
        ]);
        
        $maids = $query->toArray();
        
        $maidAddress = [];
        foreach ($maids as $value) {
            if(sizeof($value['user']['c_addresses']) !=0){
                $data = $value['user']['c_addresses'][0];
                if($data['lat'] != null && $data['lat']!='' && $data['long']!=null && $data['long'] !=''){
                     array_push($maidAddress,[$value['user']['firstname'],$data['lat'],$data['long']]);
                }
            }
        }
        
        return $maidAddress;
    }

}
