<?php

use wenbinye\tars\rpc\route\InMemoryRouteResolver;
use wenbinye\tars\rpc\TarsClient;
use wenbinye\tars\rpc\route\Route;
use wenbinye\tars\demo\client\HelloServant;

$loader = require __DIR__ . '/../vendor/autoload.php';

$proxy = TarsClient::builder()
    ->setRouteResolver(new InMemoryRouteResolver([
        Route::fromString("TestApp.HelloServer.HelloObj@tcp -h 127.0.0.1 -p 18600 -t 3000")
    ]))
    ->createProxy(HelloServant::class);

echo $proxy->hello(2020, "world");
