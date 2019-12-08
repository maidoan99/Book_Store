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
            "partnerCode"=> "MOMOZQ6020190118",
                "accessKey"=> "TKrL3r2CDhuPoFlZ",
                "secretKey"=> "aeOpV10vSuXzX9XjjkEtXYrcY6WwwyJY",
        ])->send();
        
        if ($response->isRedirect()) {
            $redirectUrl = $response->getRedirectUrl();
            
            // TODO: chuyển khách sang trang MoMo để thanh toán
        }
    }
}
