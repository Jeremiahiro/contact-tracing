<?php

return [
    'name' => env('APP_NAME', 'SOP'),
    'manifest' => [
        'name' => env('APP_NAME', 'SOP'),
        'short_name' => 'SOP',
        'start_url' => '/',
        'background_color' => '#0000ff',
        'theme_color' => '#0000ff',
        'display' => 'standalone',
        'orientation'=> 'portrait',
        'status_bar'=> '#0000ff',
        'icons' => [
            '72x72' => [
                'path' => '../frontend/img/icons/icon-72x72.png',
                'purpose' => 'any'
            ],
            '96x96' => [
                'path' => '../frontend/img/icons/icon-96x96.png',
                'purpose' => 'any'
            ],
            '128x128' => [
                'path' => '../frontend/img/icons/icon-128x128.png',
                'purpose' => 'any'
            ],
            '144x144' => [
                'path' => '../frontend/img/icons/icon-144x144.png',
                'purpose' => 'any'
            ],
            '152x152' => [
                'path' => '../frontend/img/icons/icon-152x152.png',
                'purpose' => 'any'
            ],
            '192x192' => [
                'path' => '../frontend/img/icons/icon-192x192.png',
                'purpose' => 'any'
            ],
            '384x384' => [
                'path' => '../frontend/img/icons/icon-384x384.png',
                'purpose' => 'any'
            ],
            '512x512' => [
                'path' => '../frontend/img/icons/icon-512x512.png',
                'purpose' => 'any'
            ],
        ],
        'splash' => [
            '640x1136' => '../img/splash/splash-640x1136.png',
            '750x1334' => '../img/splash/splash-750x1334.png',
            '828x1792' => '../img/splash/splash-828x1792.png',
            '1125x2436' => '../img/splash/splash-1125x2436.png',
            '1242x2208' => '../img/splash/splash-1242x2208.png',
            '1242x2688' => '../img/splash/splash-1242x2688.png',
            '1536x2048' => '../img/splash/splash-1536x2048.png',
            '1668x2224' => '../img/splash/splash-1668x2224.png',
            '1668x2388' => '../img/splash/splash-1668x2388.png',
            '2048x2732' => '../img/splash/splash-2048x2732.png',
        ],
        'shortcuts' => [
            [
                'name' => 'Shortcut Link 1',
                'description' => 'Shortcut Link 1 Description',
                'url' => '/shortcutlink1',
                'icons' => [
                    "src" => "../img/icons/icon-72x72.png",
                    "purpose" => "any"
                ]
            ],
            [
                'name' => 'Shortcut Link 2',
                'description' => 'Shortcut Link 2 Description',
                'url' => '/shortcutlink2'
            ]
        ],
        'custom' => []
    ]
];
