<?php

return [

    //-------------------------------
    // Timezone for insert dates in database
    // If you want Gateway not set timezone, just leave it empty
    //--------------------------------
    'timezone' => 'Asia/Tehran',

    //--------------------------------
    // Zarinpal gateway
    //--------------------------------
    'zarinpal' => [
        'merchant-id'  => '4d6be3be-80b8-4fe7-964d-3c06ae8e8897',
        'type'         => 'zarin-gate',             // Types: [zarin-gate || normal]
        'callback-url' => '/pay/callback',
        'server'       => 'iran',                // Servers: [germany || iran]
        'email'        => 'imohammadd@gmail.com',
        'mobile'       => '09374909953',
        'description'  => 'description',
    ],

    //--------------------------------
    // Mellat gateway
    //--------------------------------
    'mellat' => [
        'username'     => '',
        'password'     => '',
        'terminalId'   => 0000000,
        'callback-url' => '/'
    ],

    //--------------------------------
    // Payline gateway
    //--------------------------------
    'payline' => [
        'api' => 'xxxxx-xxxxx-xxxxx-xxxxx-xxxxxxxxxxxxxxxxxxxxxxxxxxxx',
        'callback-url' => '/'
    ],

    //--------------------------------
    // Sadad gateway
    //--------------------------------
    'sadad' => [
        'merchant'      => '',
        'transactionKey'=> '',
        'terminalId'    => 000000000,
        'callback-url'  => '/'
    ],

    //--------------------------------
    // JahanPay gateway
    //--------------------------------
    'jahanpay' => [
        'api' => 'xxxxxxxxxxx',
        'callback-url' => '/'
    ],

    //--------------------------------
    // Parsian gateway
    //--------------------------------
    'parsian' => [
        'pin'          => 'xxxxxxxxxxxxxxxxxxxx',
        'callback-url' => '/'
    ],

    //-------------------------------
    // Tables names
    //--------------------------------
    'table'=> 'gateway_transactions',
];
