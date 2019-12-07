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
            'orderId' => 'Mã đơn hàng',
            'requestId' => 'Mã request id, gợi ý nên xài uuid4',
        ])->send();
        
        echo 'send thnah cong';
        if ($response->isRedirect()) {
            $redirectUrl = $response->getRedirectUrl();
            
            return view('main.create_payment');
        }
        

        // return view('main.create_payment');
    }
}
