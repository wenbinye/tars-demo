<?php

return [
    "application" => [
        'logging' => [
            'level' => [
                'wenbinye.tars' => 'info',
                'kuiper' => 'info'
            ]
        ],
        "web" => [
            "framework" => 'slim'
        ],
        'mysql' => [
            'host' => getenv("DB_HOST") ?: 'localhost',
            'port' => (int) (getenv("DB_PORT") ?: 3306)
        ]
    ]
];