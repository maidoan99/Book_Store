<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function createPayment()
    {
        // $partnerCode = "MOMOQ8CB20191121";
        // $accessKey = "9aGYeOxLihzA2BNK";
        // $serectkey = "271kUhDC2FZEyCSSoegfTY8MQNldnREQ";
        // $requestId = time() . "";
        // $amount = 20000;
        // $orderId = time()."";
        // $orderInfo = 'test thanh toan';
        // $returnUrl = 'https://bookstore-uet.herokuapp.com/home';
        // $notifyurl = 'https://bookstore-uet.herokuapp.com/ipn/';
        // $extraData = 'merchantName=Payment';

        // $rawHash = "partnerCode=" . $partnerCode . "&accessKey=" . $accessKey . "&requestId=" . $requestId . "&amount=" . $amount . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&returnUrl=" . $returnUrl . "&notifyUrl=" . $notifyurl . "&extraData=" . $extraData;
        // $signature = hash_hmac("sha256", $rawHash, $serectkey);

        $response = \MoMoAIO::purchase([
            'amount' => 20000,
            'returnUrl' => 'https://bookstore-uet.herokuapp.com/home',
            'notifyUrl' => 'https://bookstore-uet.herokuapp.com/ipn/',
            'orderId' => time() . "",
            'requestId' => time() . "",
            "partnerCode"=> "MOMOZQ6020190118",
            "accessKey"=> "TKrL3r2CDhuPoFlZ",
            "secretKey"=> "aeOpV10vSuXzX9XjjkEtXYrcY6WwwyJY",
            // 'testMode' => false,
            // 'orderInfo' => 'test thnah toan qua momo',
            // 'requestType' => 'captureMoMoWallet',
            // 'signature' => $signature,
            // 'extraData' => $extraData
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
