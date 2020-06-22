<?php // -*- php -*-

return [
    "application" => [
        "web" => [
            "framework" => 'slim',
            'view' => [
                'path' => '{tars.application.server.basepath}/resources/views'
            ],
            'log-error' => true,
            'include-stacktrace' => 'always',
            'display-error' => true,
            'middleware' => [
                \Slim\Middleware\ErrorMiddleware::class,
                \kuiper\web\middleware\Session::class
            ],
        ],
        "tars" => [
            "route_list" => [
                "PHPDemo.PHPTcpServer.HelloObj@tcp -h 127.0.0.1 -p 18081 -t 60000",
            ],
        ],
        "logging" => [
            "level" => [
                # "kuiper\\swoole" => 'debug'
            ]
        ],
        'database' => [
            'host' => getenv("DB_HOST") ?: 'localhost',
            'port' => (int)(getenv("DB_PORT") ?: 3306)
        ]
    ]
];