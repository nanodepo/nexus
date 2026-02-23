<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Application Color
    |--------------------------------------------------------------------------
    |
    | The entire interface is built on the basis of this color.
    |
    */

    'color' => env('NEXUS_APP_COLOR', '4095BF'),
    'scheme' => 'smart', // smart split, analogous or triadic

    /*
    |--------------------------------------------------------------------------
    | Palettes & Gradients
    |--------------------------------------------------------------------------
    |
    | Named color palettes and gradient defaults.
    |
    */

    // Ordered palette: base Gruvbox colors + 7 intermediates
    'palette' => [
        'red' => '#cc241d',
        'red-orange' => '#d24416',
        'orange' => '#d65d0e',
        'orange-yellow' => '#d77d10',
        'yellow' => '#d79921',
        'yellow-green' => '#b79917',
        'green' => '#98971a',
        'green-aqua' => '#7b9c41',
        'aqua' => '#689d62',
        'aqua-blue' => '#47937b',
        'blue' => '#458588',
        'blue-purple' => '#6a7bad',
        'purple' => '#b16286',
        'purple-red' => '#c9405e',
    ],
    'gradient' => [
        'from' => env('NEXUS_GRADIENT_FROM', 'red'),
        'to' => env('NEXUS_GRADIENT_TO', 'purple-red'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Thumbnail Helper
    |--------------------------------------------------------------------------
    |
    | Fields for configuring a helper that creates
    | previews for images of specified dimensions.
    |
    */
    'default_folder' => 'other',
    'default_size' => '500x500',
    'allowed_sizes' => [
        '96x96',
        '360x360',
        '500x500',
        '1000x1000'
    ],

    /*
   |--------------------------------------------------------------------------
   | Price Helper
   |--------------------------------------------------------------------------
   |
   | Settings of the helper that returns the ValueObject of the price.
   |
   */
    'precision' => 100,
    'decimals' => 0,
    'currencies' => [
        'UAH' => '₴',
        'RUB' => '₽',
        'USD' => '$',
        'EUR' => '€',
        'BTC' => '₿',
        'ETH' => 'Ξ',
        'SOL' => '◎',
    ],
];
