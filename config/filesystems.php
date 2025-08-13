<?php

return [

    'default' => env('FILESYSTEM_DISK', 'public'),  // Cambiado a 'public' por defecto

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app/private'),
            'throw' => false,
            'report' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
            'permissions' => [
                'file' => [
                    'public' => 0664,
                    'private' => 0600,
                ],
                'dir' => [
                    'public' => 0775,
                    'private' => 0700,
                ],
            ],
        ],

        'productos' => [  // Nuevo disco específico para imágenes de productos
            'driver' => 'local',
            'root' => storage_path('app/public/productos'),
            'url' => env('APP_URL').'/storage/productos',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
            'report' => false,
        ],

    ],

    'links' => [
        public_path('storage') => storage_path('app/public'),
        public_path('images/productos') => storage_path('app/public/productos'),  // Nuevo enlace simbólico
    ],

    // Nueva sección para configuraciones personalizadas
    'custom' => [
        'image' => [
            'productos' => [
                'max_size' => 2048, // 2MB
                'mime_types' => ['image/jpeg', 'image/png', 'image/webp'],
                'dimensions' => [
                    'min_width' => 300,
                    'min_height' => 300,
                    'max_width' => 2000,
                    'max_height' => 2000,
                ],
            ],
        ],
    ],

];