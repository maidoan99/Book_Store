<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function createPayment()
    {
        $response = \MoMoAIO::purchase([
            'amount' => 20000,
            'returnUrl' => 'https://bookstore-uet.herokuapp.com/home',
            'notifyUrl' => 'https://bookstore-uet.herokuapp.com/ipn/',
            'orderId' => time() . " ",
            'requestId' => time() . " ",
        ])->send();
        
        if ($response->isRedirect()) {
            echo "tao yeu cau thnah toan thanh cong";
            $redirectUrl = $response->getRedirectUrl();
        } else{
            echo $response->localMessage . '\n';
            echo $response->message;
        }
    }
}
