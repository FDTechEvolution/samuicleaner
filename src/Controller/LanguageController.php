<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\I18n;
use Cake\Core\Configure;
/**
 * Language Controller
 *
 * @property \App\Model\Table\LanguageTable $Language
 */
class LanguageController extends AppController {
    
    public function change($str='th'){
        //Configure::write('Config.language', $str);
        $this->request->session()->write('Config.language',$str);
        return $this->redirect(['controller'=>'home']);
    }
}
