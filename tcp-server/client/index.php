<?php

use wenbinye\tars\rpc\route\InMemoryRouteResolver;
use wenbinye\tars\rpc\TarsClient;
use wenbinye\tars\rpc\route\Route;

$loader = require __DIR__ . '/vendor/autoload.php';

$routeResolver = new InMemoryRouteResolver([
    Route::fromString("PHPTest.PHPTcpServer.HelloObj@tcp -h 192.168.0.108 -p 18081 -t 3000")
]);

$proxy = TarsClient::builder()
    ->setRouteResolver($routeResolver)
    ->createProxy(\app\servant\HelloServiceServant::class);
echo $proxy->hello("world, 2020");