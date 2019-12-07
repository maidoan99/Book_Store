<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function createPayment()
    {
        $response = \MoMoAIO::purchase([
            'amount' => 20000,
            'returnUrl' => 'http://domaincuaban.com/thanh-toan-thanh-cong/',
            'notifyUrl' => 'http://domaincuaban.com/ipn/',
            'orderId' => 'Mã đơn hàng',
            'requestId' => 'Mã request id, gợi ý nên xài uuid4',
        ])->send();
        
        echo 'send thnah cong';
        if ($response->isRedirect()) {
            $redirectUrl = $response->getRedirectUrl();
            
            // TODO: chuyển khách sang trang MoMo để thanh toán
        }
        

        // return view('main.create_payment');
    }
}
