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
class ForeignExchangeRateComponent extends Component {

    public function getRate() {
        $mainUrl = "https://free.currencyconverterapi.com/api/v5/convert?compact=y&q=";
        $convertionRates = [];
        
        $currencies = ['USD', 'CNY', 'EUR', 'JPY', 'AUD'];
        foreach ($currencies as $value) {
            $baseTo =  $value."_THB";
            $url = $mainUrl . $baseTo;
            $json = file_get_contents($url);
            $json_data = json_decode($json, true);
            $json_data['base'] = $value;
            $json_data['rate'] = $json_data[$baseTo]['val'];
            $json_data['url'] = $url;
            $json_data['icon'] = "https://www.kasikornbank.com/SiteCollectionDocuments/assets/img/currency/".$value.".png";
            array_push($convertionRates, $json_data);
        }
       
        //$this->log($convertionRates, 'debug');
        return $convertionRates;
    }

    private function currencyConverter($_from_Currency, $_to_Currency) {
        /*
          $from_Currency = urlencode($from_Currency);
          $to_Currency = urlencode($to_Currency);
          $encode_amount = 1;
          $get = file_get_contents("https://finance.google.com/finance/converter?a=$encode_amount&from=$from_Currency&to=$to_Currency");
          $this->log("https://finance.google.com/finance/converter?a=$encode_amount&from=$from_Currency&to=$to_Currency",'debug');
          $get = explode("<span class=bld>",$get);
          $get = explode("</span>",$get[1]);
          $converted_currency = preg_replace("/[^0-9\.]/", null, $get[0]);
          return $converted_currency;
         * 
         */
        $from_Currency = urlencode($_from_Currency);
        $to_Currency = urlencode($_to_Currency);
        $get = file_get_contents("https://www.kasikornbank.com/TH/rate/Pages/Foreign-Exchange.aspx");
        //$this->log("http://www.xe.com/currencycharts/?from=".$from_Currency."&to=".$to_Currency,'debug');
        $_temp = explode('table-exchangerate', $get);

        $this->log($_temp, 'debug');
    }

}
