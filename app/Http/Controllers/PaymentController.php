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
            "partnerCode"=> "MOMOQ8CB20191121",
                "accessKey"=> "9aGYeOxLihzA2BNK",
                "secretKey"=> "271kUhDC2FZEyCSSoegfTY8MQNldnREQ",
                'testMode' => false,
        ])->send();
        
        if ($response->isRedirect()) {
            echo "tao yeu cau thnah toan thanh cong";
            $redirectUrl = $response->getRedirectUrl();
        } else{
            echo $response->localMessage;
            echo "<br>";
            echo $response->message;
        }
    }
}
