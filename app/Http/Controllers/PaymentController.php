<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function createPayment()
    {
        $response = \MoMoAIO::purchase([
            'amount' => 20000,
            'returnUrl' => 'https://bookstore-uet.herokuapp.com/thanh-toan-thanh-cong/',
            'notifyUrl' => 'https://bookstore-uet.herokuapp.com/ipn/',
            'orderId' => time(),
            'requestId' => time(),
            'accessKey' => '9aGYeOxLihzA2BNK',
            'secretKey' => '271kUhDC2FZEyCSSoegfTY8MQNldnREQ',
            'partnerCode' => 'MOMOQ8CB20191121'
        ])->send();
        
        if ($response->isRedirect()) {
            $redirectUrl = $response->getRedirectUrl();
        } else{
            echo $response->message;
        }
    }
}
