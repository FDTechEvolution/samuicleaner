<?php

namespace App\Mailer;

use Cake\Mailer\Mailer;

class UserMailer extends Mailer {

    public function welcome_register($user) {
        $this->to($user->email)
                ->subject(sprintf('Welcome %s', $user->username))
                ->layout('default')
                ->emailFormat('html')
                ->set(['subject' => 'Hi', 'username' => $user->username, 'url' => '']);
    }

    public function forgot_password($user) {
        $this->to($user->email)
                ->subject(__('Reset your password'))
                ->layout('default')
                ->emailFormat('html')
                ->set(['subject' => __('Reset your password'), 'user' => $user, 'url' => '','username' => $user->username]);
    }
    
    public function register_maid_success($user){
        $this->to($user->email)
                ->subject(__('Become a cleaner'))
                ->layout('default')
                ->emailFormat('html')
                ->set(['subject' => __('Become a cleaner'), 'user' => $user, 'url' => '','username' => $user->username]);
    }

    

}
