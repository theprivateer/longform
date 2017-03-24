<?php

return [

    'upload-prefix' => 'uploads',

    'processor' => 'glide', // 'default

    'processors' => [ // 'drivers'
        'glide' => [
            'class'         => \App\Images\Processors\GlideProcessor::class,
            'filesystem'    => 'local', // default to whatever the default filesystem is
            'cache'         => 'local'
        ],
        'imgix' => [
            'class'             => \App\Images\Processors\ImgixProcessor::class,
            'source_server'     => '',
            'source_signature'  => '',
            'source_prefix'     => ''
        ]
    ],

    'presets'   => [
        'lg'    => ['w' => 1024, 'h' => 1024, 'fit' => 'contain'],
        'md'    => ['w' => 560, 'h' => 560, 'fit' => 'contain'],
        'sm'    => ['w' => 200, 'h' => 200, 'fit' => 'crop'],
    ],

];