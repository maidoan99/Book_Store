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
        ])->send();
        
        if ($response->isRedirect()) {
            $redirectUrl = $response->getRedirectUrl();
            echo 'send thanh cong';
            return view('main.create_payment');
        }
    }
}
