<?php

namespace App\Services;

class ManifestService
{
    public function generate()
    {
        $manifest = [
            'name' => 'Presenze Smart',
            'short_name' => 'Presenze',
            'start_url' => '/',
            'display' => 'fullscreen',
            'background_color' => '#00AFF0',
            'theme_color' => '#00AFF0',
            'icons' => [
                [
                    'src' => '/appstore.png',
                    'sizes' => '1024x1024',
                    'type' => 'image/png',
                ],
                [
                    'src' => '/playstore.png',
                    'sizes' => '512x512',
                    'type' => 'image/png',
                ],
                [
                    "src" => "/android-chrome-192x192.png",
                    "sizes" => "192x192",
                    "type" => "image/png"
                ],
                [
                    "src" => "/android-chrome-512x512.png",
                    "sizes" => "512x512",
                    "type" => "image/png"
                ]


            ],
            'screenshots' =>
            [
                [
                    'src' => '/screenshot1.png',
                    'sizes' => '560x996',
                    'type' => 'image/png',
                    'form_factor' => 'wide'
                ],
                [
                    'src' => '/screenshot1.png',
                    'sizes' => '560x996',
                    'type' => 'image/png',

                ],
            ]
        ];

        return json_encode($manifest);
    }
}
