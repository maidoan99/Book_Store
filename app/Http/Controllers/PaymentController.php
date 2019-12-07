<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function createPayment()
    {
        header('Content-type: text/html; charset=utf-8');

        $config = file_get_contents('../config.json');
        $array = json_decode($config, true);

        include "../common.php";


        $endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";


        $partnerCode = $array["partnerCode"];
        $accessKey = $array["accessKey"];
        $secretKey = $array["secretKey"];
        $orderInfo = "Thanh toán qua MoMo";
        $amount = "10000";
        $orderId = time() . "";
        $returnUrl = "http://localhost:8080/paymomo/result.php";
        $notifyurl = "http://localhost:8080/paymomo/ipn_momo.php";
        // Lưu ý: link notifyUrl không phải là dạng localhost
        $extraData = "merchantName=MoMo Partner";


        if (!empty($_POST)) {
            $partnerCode = $_POST["partnerCode"];
            $accessKey = $_POST["accessKey"];
            $serectkey = $_POST["secretKey"];
            $orderId = $_POST["orderId"]; // Mã đơn hàng
            $orderInfo = $_POST["orderInfo"];
            $amount = $_POST["amount"];
            $notifyurl = $_POST["notifyUrl"];
            $returnUrl = $_POST["returnUrl"];
            $extraData = $_POST["extraData"];

            $requestId = time() . "";
            $requestType = "captureMoMoWallet";
            $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
            //before sign HMAC SHA256 signature
            $rawHash = "partnerCode=" . $partnerCode . "&accessKey=" . $accessKey . "&requestId=" . $requestId . "&amount=" . $amount . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&returnUrl=" . $returnUrl . "&notifyUrl=" . $notifyurl . "&extraData=" . $extraData;
            $signature = hash_hmac("sha256", $rawHash, $serectkey);
            $data = array(
                'partnerCode' => $partnerCode,
                'accessKey' => $accessKey,
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'returnUrl' => $returnUrl,
                'notifyUrl' => $notifyurl,
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature
            );
            $result = execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);  // decode json

            //Just a example, please check more in there

            header('Location: ' . $jsonResult['payUrl']);
        }
        return view('CreatePayment');
    }
}
