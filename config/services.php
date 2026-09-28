<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Payments
    |--------------------------------------------------------------------------
    |
    | 'gateway' selects the PaymentGateway implementation. The default,
    | 'manual', produces bank-transfer/QRIS instructions and settles on
    | confirmation. A real provider (midtrans, xendit) is a drop-in once
    | its credentials are set here.
    |
    */

    'payments' => [
        'gateway' => env('PAYMENT_GATEWAY', 'manual'),

        'midtrans' => [
            'server_key' => env('MIDTRANS_SERVER_KEY'),
            'client_key' => env('MIDTRANS_CLIENT_KEY'),
            'is_production' => (bool) env('MIDTRANS_IS_PRODUCTION', false),
        ],

        'xendit' => [
            'secret_key' => env('XENDIT_SECRET_KEY'),
        ],

        'bank' => [
            'account_name' => env('PAYMENT_BANK_NAME', 'Greentify Sustainability Fund'),
            'account_number' => env('PAYMENT_BANK_NUMBER', '1234-5678-90'),
        ],

        // Static QRIS. The acquirer issues the merchant account id; the
        // country/currency codes are fixed by the Indonesian standard.
        'qris' => [
            'merchant_account_id' => env('QRIS_MERCHANT_ACCOUNT_ID', 'ID1024398201947'),
            'merchant_name' => env('QRIS_MERCHANT_NAME', 'GREENTIFY'),
            'merchant_city' => env('QRIS_MERCHANT_CITY', 'Bandung'),
        ],
    ],

];
