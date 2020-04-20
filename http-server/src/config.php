<?php

return [
    'application' => [
        'listeners' => [
            kuiper\swoole\listener\HttpRequestEventListener::class
        ],
    ]
];