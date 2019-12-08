<?php

return [
    // Cấu hình cho các cổng thanh toán tại hệ thống của bạn, các cổng không xài có thể xóa cho gọn hoặc không điền.
    // Các thông số trên có được khi bạn đăng ký tích hợp.

    'gateways' => [
        'MoMoAIO' => [
            'driver' => 'MoMo_AllInOne',
            'options' => [
                "partnerCode"=> "MOMOZQ6020190118",
                "accessKey"=> "TKrL3r2CDhuPoFlZ",
                "secretKey"=> "aeOpV10vSuXzX9XjjkEtXYrcY6WwwyJY",
                'testMode' => false,
            ],
        ],
        'MoMoQRCode' => [
            'driver' => 'MoMo_QRCode',
            'options' => [
                "partnerCode"=> "MOMOZQ6020190118",
                "accessKey"=> "TKrL3r2CDhuPoFlZ",
                "secretKey"=> "aeOpV10vSuXzX9XjjkEtXYrcY6WwwyJY",
                'testMode' => false,
            ],
        ],
        'VNPay' => [
            'driver' => 'VNPay',
            'options' => [
                'vnpTmnCode' => '',
                'vnpHashSecret' => '',
                'testMode' => false,
            ],
        ],
    ],
];
