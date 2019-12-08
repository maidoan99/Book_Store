<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function createPayment(Request $request)
    {
        $response = \MoMoAIO::purchase([
            'amount' => 20000,
            'returnUrl' => 'https://bookstore-uet.herokuapp.com/thanh-toan-thanh-cong/',
            'notifyUrl' => 'https://bookstore-uet.herokuapp.com/ipn/',
            'orderId' => time(),
            'requestId' => time()
        ])->send();
        
        if ($response->isRedirect()) {
            echo "tao yeu cau thanh cong";
            $redirectUrl = $response->getRedirectUrl();
            return redirect($redirectUrl);
            
            // TODO: chuyển khách sang trang MoMo để thanh toán
        } else{
            echo $response->localMessage;
            echo "<br>";
            echo $response->message;
        }
    }
}
