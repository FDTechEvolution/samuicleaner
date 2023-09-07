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

    //https://free.currconv.com/api/v7/convert?q=USD_THB&compact=ultra&apiKey=e37fd5c1eb59a25b325b
    public function getRate() {
       
        $convertionRates = [];

        $currencies = ['USD', 'CNY', 'EUR', 'JPY', 'AUD'];
        foreach ($currencies as $value) {
            $result = $this->exchangeratesapi($value, 'THB');


            
            $json_data['base'] = $value;
            $json_data['rate'] = $result;
            //$json_data['url'] = $url;
            $json_data['icon'] = "https://www.kasikornbank.com/SiteCollectionDocuments/assets/img/currency/" . $value . ".png";
            array_push($convertionRates, $json_data);
        }

        // $this->log($convertionRates, 'debug');
        return $convertionRates;
    }
    
    private function exchangeratesapi($from='',$to=''){
        // $ch = curl_init('https://api.exchangeratesapi.io/latest?base='.$from.'&symbols='.$to);
        // $ch = curl_init('https://api.apilayer.com/exchangerates_data/latest?symbols='.$to.'&base='.$from);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://v6.exchangerate-api.com/v6/d36f138571f50770d8324c3d/latest/'.$from);
        // $headers = [
        //     'Accept:*/*',
        //     'apikey:OsBgJhLjYIMgFR2FgJEam7kpVAYyRQIE'
        // ];
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $json = curl_exec($ch);
        curl_close($ch);

        // $this->log($json, 'debug');

        $conversionResult = json_decode($json, true);

        // $this->log($conversionResult, 'debug');

        // return $conversionResult['rates'][$to];
        return $conversionResult['conversion_rates'][$to];
    }

   

    private function fixer($from = '',$to = '') {
        // set API Endpoint, access key, required parameters
        $endpoint = 'convert';
        $access_key = '601444eb0b10e1cc1be208eead613a48';

        $from = 'USD';
        $to = 'EUR';
        $amount = 1;

// initialize CURL:
        $ch = curl_init('http://data.fixer.io/api/' . $endpoint . '?access_key=' . $access_key . '&from=' . $from . '&to=' . $to . '&amount=' . $amount . '');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// get the JSON data:
        $json = curl_exec($ch);
        curl_close($ch);

// Decode JSON response:
        $conversionResult = json_decode($json, true);

// access the conversion result
        return $conversionResult;
    }

}
