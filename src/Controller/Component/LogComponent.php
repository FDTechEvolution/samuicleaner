<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controller\Component;

use Cake\Controller\Component;
/**
 * Description of Utils
 *
 * @author sakorn.s
 */
class LogComponent extends Component{

    public function logDebug($value=null,$prefix=''){
        if(!is_null($value)){
            if($prefix !=''){
                $this->log($prefix,'debug');
            }
            
            $this->log($value, 'debug');
        }
        
    }

}


