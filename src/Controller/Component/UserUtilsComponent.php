<?php

namespace App\Controller\Component;

use Cake\Controller\Component;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsersUtilsComponent
 *
 * @author sakorn.s
 */
class UserUtilsComponent extends Component {

    
    
    public function makeUsername($user) {
        $username = $user->firstname . "." . $user->lastname;
        return $username;
    }
    
    

    public function isConformablePassword($password = null, $confirmPassword = null) {
        if (is_null($password) || $password == '' || is_null($confirmPassword) || $confirmPassword == '') {
            
            return false;
        }

        if ($password === $confirmPassword) {
            return true;
        }
       
        return false;
    }

}

?>
