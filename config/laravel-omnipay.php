<?php

return [
    // Cấu hình cho các cổng thanh toán tại hệ thống của bạn, các cổng không xài có thể xóa cho gọn hoặc không điền.
    // Các thông số trên có được khi bạn đăng ký tích hợp.

    'gateways' => [
        'MoMoAIO' => [
            'driver' => 'MoMo_AllInOne',
            'options' => [
                'accessKey' => 'SvDmj2cOTYZmQQ3H',
                'secretKey' => 'PPuDXq1KowPT1ftR8DvlQTHhC03aul17',
                'partnerCode' => 'MOMOIQA420180417',
                'testMode' => true,
            ],
        ],
        'MoMoQRCode' => [
            'driver' => 'MoMo_QRCode',
            'options' => [
                'accessKey' => 'SvDmj2cOTYZmQQ3H',
                'secretKey' => 'PPuDXq1KowPT1ftR8DvlQTHhC03aul17',
                'partnerCode' => 'MOMOIQA420180417',
                'testMode' => true,
            ],
        ],
        'OnePayDomestic' => [
            'driver' => 'OnePay_Domestic',
            'options' => [
                'vpcMerchant' => '',
                'vpcAccessCode' => '',
                'vpcUser' => '',
                'vpcPassword' => '',
                'vpcHashKey' => '',
                'testMode' => false,
            ],
        ],
        'OnePayInternational' => [
            'driver' => 'OnePay_International',
            'options' => [
                'vpcMerchant' => '',
                'vpcAccessCode' => '',
                'vpcUser' => '',
                'vpcPassword' => '',
                'vpcHashKey' => '',
                'testMode' => false,
            ],
        ],
        'VTCPay' => [
            'driver' => 'VTCPay',
            'options' => [
                'websiteId' => '',
                'securityCode' => '',
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
