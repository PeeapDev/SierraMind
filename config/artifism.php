<?php

return [

    /*
    |--------------------------------------------------------------------------
    | The application is in demo mode or not
    |--------------------------------------------------------------------------
    |
    | This option controls the demo mode of the application.
    |
    | value: true, false
    |
    */

    'is_demo' => env('IS_DEMO', false),

    /* The application version */
    'version' => env('SIERRAMIND_VERSION', '1.0.0'),

    /** The Application Install */
    'app_install' => env('APP_INSTALL', false),

    /*
    |--------------------------------------------------------------------------
    | Unique Item Code
    |--------------------------------------------------------------------------
    |
    | This key represents the unique item code.
    | It is essential not to remove or modify this code if you intend to receive updates and maintain compatibility with our scripts.
    |
    | Warning: Don't remove or modify item code.
    |
    */
    'item_code' => '47251169',

    /* The application file version */
    'file_version' => '2.9.0',

    /** SIERRA MIND versions
     *
     * All of the SIERRAMIND versions are listed here.
     * **/
    'versions' => [
        '1.0.0',
        '1.0.1',
        '1.1.0',
        '1.2.0',
        '1.2.1',
        '1.3.0',
        '1.4.0',
        '1.5.0',
        '1.6.0',
        '1.6.1',
        '1.7.0',
        '1.8.0',
        '2.0.0',
        '2.0.1',
        '2.2.0',
        '2.3.0',
        '2.4.0',
        '2.5.0',
        '2.6.0',
        '2.7.0',
        '2.8.0',
        '2.9.0'
    ],

    /**
     * Thumbnail path
     *
     * Note:If you want to change the thumbnail_dir name,
     * You must change dir name from public/uploads/[old thumbnail directory name]
     * */
    'thumbnail_dir' => 'sizes',

    /* Demo account credentails, Only work when the application on demo mode */
    'credentials' => [
        'admin' => [
            'email' => 'admin@PEEAP.COM',
            'password' => '123456',
        ],
        'customer' => [
            'email' => 'user@PEEAP.COM',
            'password' => '123456',
        ],
    ],

    'server_url ' => 'https://my.peeap.com',

    //Admin dashboard option
    'widget_options' => [
        'cellHeight' => 85,
        'float' => false,
        'disableResize' => false,
        'alwaysShowResizeHandle' => true,
    ],
];