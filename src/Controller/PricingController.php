<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Pricing Controller
 *
 * @property \App\Model\Table\PricingTable $Pricing
 */
class PricingController extends AppController {

    public $Appsettings = null;
    public $Services = null;
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        //$this->set('title','Pricing');
        //http://api.fixer.io/latest?base=USD&symbols=THB
        $this->loadComponent('ForeignExchangeRate');
        //$this->set('convertionRates',$this->ForeignExchangeRate->getRate());
        //$this->set('convertionRates',$this->getRate());
        //$this->set('prices',$this->getPrice());
        
        $this->Appsettings = TableRegistry::get('Appsettings');
        $query = $this->Appsettings->find('all');
        $appsetting = $query->first();
        $this->set('appsetting',$appsetting);
        
        $this->Services = TableRegistry::get('Services');
        $query = $this->Services->find('all', [
            'conditions' => ['Services.type' => 'Add-ons'],
            'order' => ['seq' => 'ASC']
        ]);

        $addons = $query->toArray();
        $this->set('addons', $addons);
    }

    private function getPrice(){
        $this->Appsettings = TableRegistry::get('Appsettings');
        $query = $this->Appsettings->find('all');
        $appsetting = $query->first();
        $price = $appsetting->price_per_hour;
        return [
            ['size'=>'40','room'=>1,'hour'=>2,'price'=>$price],
            ['size'=>'60','room'=>1,'hour'=>2.5,'price'=>$price],
            ['size'=>'70','room'=>2,'hour'=>3,'price'=>$price],
            ['size'=>'80','room'=>3,'hour'=>3.5,'price'=>$price],
            ['size'=>'90','room'=>4,'hour'=>4,'price'=>$price],
            ['size'=>'100','room'=>5,'hour'=>5,'price'=>$price]
        ];
    }
    
   
  

}
