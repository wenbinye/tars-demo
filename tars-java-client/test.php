<?php

use wenbinye\tars\server\framework\Slim;
use wenbinye\tars\server\Config;
use wenbinye\tars\rpc\route\Route;

$loader = require __DIR__ . '/vendor/autoload.php';

Config::parseFile(__DIR__.'/config.conf');

$container = (new Slim($loader, ["app\\servant"]))->create();
$container->get(\wenbinye\tars\rpc\route\InMemoryRouteResolver::class)
    ->addRoute(Route::fromString("TestApp.HelloServer.HelloObj@tcp -h 127.0.0.1 -p 18600 -t 3000"));

$client = $container->get(\wenbinye\tars\rpc\TarsClientInterface::class);
$client->addMiddleware($container->get(\wenbinye\tars\rpc\middleware\RequestLogMiddleware::class));

echo "my pid : " . getmypid(), "\n";
echo $container->get(\app\servant\HelloServant::class)
    ->hello(10, "world, 2020");
