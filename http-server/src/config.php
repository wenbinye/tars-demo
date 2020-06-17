<?php  // -*- php -*- 

return [
    "application" => [
        "web" => [
            "framework" => 'slim'
        ],
        "tars" => [
            "route_list" => [
                "PHPDemo.PHPTcpServer.HelloObj@tcp -h 127.0.0.1 -p 18081 -t 60000",
            ],
        ],
        'mysql' => [
            'host' => getenv("DB_HOST") ?: 'localhost',
            'port' => (int) (getenv("DB_PORT") ?: 3306)
        ]
    ]
];