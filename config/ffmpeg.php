<?php

return [
    'ffmpeg' => [
        'binaries' => env('FFMPEG_BINARIES', '/opt/local/ffmpeg/bin/ffmpeg'),
        'threads' => env('FFMPEG_THREADS', 2)
    ],
    'ffprobe' => [
        'binaries' => env('FFPROBE_BINARIES', '/opt/local/ffmpeg/bin/ffprobe'),
    ],
    'timeout' => env('FFMPEG_TIMEOUT', 3600),
];
