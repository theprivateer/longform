<?php

return [

    'upload-prefix' => 'uploads',

    'processor' => env('IMAGE_PROCESSOR', 'glide'), // 'default

    'processors' => [ // 'drivers'
        'glide' => [
            'class'         => \App\Images\Processors\GlideProcessor::class,
            'filesystem'    => 'local', // default to whatever the default filesystem is
            'cache'         => 'local'
        ],
        'imgix' => [
            'class'             => \App\Images\Processors\ImgixProcessor::class,
            'source_server'     => env('IMGIX_SOURCE'),
            'source_signature'  => env('IMGIX_SIGNATURE', ''),
            'source_prefix'     => env('IMGIX_PREFIX', '')
        ]
    ],

    'presets'   => [
        'lg'    => ['w' => 1024, 'h' => 1024, 'fit' => 'contain'],
        'md'    => ['w' => 560, 'h' => 560, 'fit' => 'contain'],
        'sm'    => ['w' => 200, 'h' => 200, 'fit' => 'crop'],
    ],

];