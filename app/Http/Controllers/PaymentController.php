<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function createPayment()
    {
        $response = \MoMoAIO::purchase([
            'accessKey' => 'klm05TvNBzhg7h7j',
            'secretKey' => 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa',
            'partnerCode' => 'MOMOBKUN20180529',
            'amount' => 20000,
            'returnUrl' => 'https://bookstore-uet.herokuapp.com/home',
            'notifyUrl' => 'https://bookstore-uet.herokuapp.com/ipn/',
            'orderId' => time(),
            'requestId' => time(),
            'orderInfo' => 'test thnah toan momo',
            'extraData' => 'merchantName=Payment'
        ])->send();
        
        if ($response->isRedirect()) {
            $redirectUrl = $response->getRedirectUrl();
        } else{
            echo $response->message;
        }
    }
}
