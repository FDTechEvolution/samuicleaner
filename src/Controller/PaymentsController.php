<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
/**
 * Payments Controller
 *
 * @property \App\Model\Table\PaymentsTable $Payments
 */
class PaymentsController extends AppController {

    public function pay($payment_id = null) {
        if (is_null($payment_id)) {
            return null;
        }


        $payment = $this->Payments->get($payment_id, ['contain' => ['Bookings']]);



        $this->set('payment', $payment);
    }

    public function completed() {
        
    }

    public function processing($payment_id = null) {
        
        //https://samuicleaner.com/payments/processing/7404c1c7-1816-4307-911b-d147b46434d6?amt=100.00&cc=THB&item_name=Cleaning%20Service&item_number=SERVICE-01&st=Completed&tx=0P413497VM877030T
        $tx = $this->request->query('tx');
        $amt = $this->request->query('amt');
        $st = $this->request->query('st');
        
        if(is_null($st) || is_null($amt)){
            
        }
        
        $payment = $this->Payments->get($payment_id, ['contain' => ['Bookings']]);
        
        if(($payment->amount - $amt) == 0){
            $now = Time::now();
            $payment->paymentdate = $now;
            $payment->status = 'CO';
            $payment->paypalid = $tx;
            $payment->description = 'Paypal Transaction ID: '.$tx.', Amount: '.$amt;
            $this->Payments->save($payment);
            
            
            return $this->redirect(['action' => 'success']); 
        }

        /*
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            debug($data);
        }
        
        $this->set('tx', $tx);
         
         */
    }

    public function success() {
        
    }

    public function cancel() {
        $this->request->session()->delete('Book');
        return $this->redirect(['controller' => 'home']);
    }

}
