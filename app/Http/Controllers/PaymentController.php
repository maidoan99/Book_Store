<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function createPayment()
    {
        $response = \MoMoAIO::purchase([
            'accessKey' => '9aGYeOxLihzA2BNK',
                'secretKey' => '271kUhDC2FZEyCSSoegfTY8MQNldnREQ',
                'partnerCode' => 'MOMOQ8CB20191121',
            'amount' => 20000,
            'returnUrl' => 'https://bookstore-uet.herokuapp.com/home',
            'notifyUrl' => 'https://bookstore-uet.herokuapp.com/ipn/',
            'orderId' => time(),
            'requestId' => time(),
            'orderInfo' => 'test thanh toan momo',
            'extraData' => 'merchantName=Payment'
        ])->send();
        
        if ($response->isRedirect()) {
            $redirectUrl = $response->getRedirectUrl();
        } else{
            echo $response->localMessage;
        }
    }
}
