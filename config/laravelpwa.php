<?php

return [
    'name' => 'Nclex',
    'manifest' => [
        'name' => env('APP_NAME', 'Nclex'),
        'short_name' =>env('APP_NAME', 'Nclex'),
        'start_url' => '/',
        'background_color' => '#ffffff',
        'theme_color' => '#000000',
        'display' => 'standalone',
        'orientation'=> 'any',
        'status_bar'=> 'black',
        'icons' => [
            '72x72' => [
                'path' => '/images/icons/logo.jpeg',
                'purpose' => 'any'
            ],
            '96x96' => [
                'path' => '/images/icons/logo.jpeg',
                'purpose' => 'any'
            ],
            '128x128' => [
                'path' => '/images/icons/logo.jpeg',
                'purpose' => 'any'
            ],
            '144x144' => [
                'path' => '/images/icons/logo.jpeg',
                'purpose' => 'any'
            ],
            '152x152' => [
                'path' => '/images/icons/icon-152x152.png',
                'purpose' => 'any'
            ],
            '192x192' => [
                'path' => '/images/icons/icon-192x192.png',
                'purpose' => 'any'
            ],
            '384x384' => [
                'path' => '/images/icons/logo.jpeg',
                'purpose' => 'any'
            ],
            '512x512' => [
                'path' => '/images/icons/logo.jpeg',
                'purpose' => 'any'
            ],
        ],
        'splash' => [
            '640x1136' => '/images/icons/logo.jpeg',
            '750x1334' => '/images/icons/logo.jpeg',
            '828x1792' => '/images/icons/logo.jpeg',
            '1125x2436' => '/images/icons/logo.jpeg',
            '1242x2208' => '/images/icons/logo.jpeg',
            '1242x2688' => '/images/icons/logo.jpeg',
            '1536x2048' => '/images/icons/logo.jpeg',
            '1668x2224' => '/images/icons/logo.jpeg',
            '1668x2388' => '/images/icons/logo.jpeg',
            '2048x2732' => '/images/icons/logo.jpeg',
        ],
        'shortcuts' => [
            [
                'name' => 'Nclex',
                'description' => 'Nclex Center is dedicated to providing each nurse with the tools to appear before the exam board and pass.',
                'url' => '/',
                'icons' => [
                    "src" => "/images/icons/logo.jpeg",
                    "purpose" => "any"
                ]
            ],
            [
                'name' => 'Nclex',
                'description' => 'Nclex Center is dedicated to providing each nurse with the tools to appear before the exam board and pass.',
                'url' => '/'
            ]
        ],
        'custom' => []
    ]
];
