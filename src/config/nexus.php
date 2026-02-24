<?php

use NanoDepo\Nexus\Theme\Themes\CatppuccinTheme;
use NanoDepo\Nexus\Theme\Themes\DefaultTheme;
use NanoDepo\Nexus\Theme\Themes\GruvboxTheme;
use NanoDepo\Nexus\Theme\Themes\NordTheme;

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
    'scheme' => 'smart', // smart, split, analogous or triadic

    /*
    |--------------------------------------------------------------------------
    | Themes & Gradients
    |--------------------------------------------------------------------------
    |
    | Named theme palettes and gradient defaults.
    |
    */

    'theme' => env('NEXUS_THEME', 'default'),
    'themes' => [
        'default' => [
            'handler' => DefaultTheme::class,
            'colors' => [
                'red' => '#ff0000',
                'orange' => '#ffa500',
                'yellow' => '#ffff00',
                'green' => '#00ff00',
                'aqua' => '#00ffff',
                'blue' => '#0000ff',
                'purple' => '#ff00ff',
            ],
            'target_lightness' => 0.60,
            'max_chroma' => 0.16,
            'chroma_scale' => 0.65,
        ],
        'gruvbox' => [
            'handler' => GruvboxTheme::class,
            'colors' => [
                'red' => '#cc241d',
                'orange' => '#d65d0e',
                'yellow' => '#d79921',
                'green' => '#98971a',
                'aqua' => '#689d62',
                'blue' => '#458588',
                'purple' => '#b16286',
            ],
        ],
        'catppuccin' => [
            'handler' => CatppuccinTheme::class,
            'colors' => [
                'red' => '#d20f39',
                'orange' => '#fe640b',
                'yellow' => '#df8e1d',
                'green' => '#40a02b',
                'aqua' => '#179299',
                'blue' => '#1e66f5',
                'purple' => '#8839ef',
            ],
        ],
        'nord' => [
            'handler' => NordTheme::class,
            'colors' => [
                'red' => '#bf616a',
                'orange' => '#d08770',
                'yellow' => '#ebcb8b',
                'green' => '#a3be8c',
                'aqua' => '#8fbcbb',
                'blue' => '#81a1c1',
                'purple' => '#b48ead',
            ],
        ],
    ],
    'gradient' => [
        'from' => env('NEXUS_GRADIENT_FROM', 'red'),
        'to' => env('NEXUS_GRADIENT_TO', 'purple'),
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
