<?php

return [
    'image' => [
        'queue' => 'default',
        'disk' => 'minio-files',
        'options' => [
            'img_preview' => [
                'width' => 300,
                'height' => 300
            ],
        ],
        'jobs' => [
            'main' => \Sn1KeRs385\FileUploader\App\Jobs\FileConverter::class,
            'chains' => [
                \Sn1KeRs385\FileUploader\App\Jobs\PreviewImageConverter::class
            ]
        ],
    ]
];
