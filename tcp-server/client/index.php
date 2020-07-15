<?php

use wenbinye\tars\rpc\route\InMemoryRouteResolver;
use wenbinye\tars\rpc\TarsClient as TarsClientImpl;
use wenbinye\tars\rpc\route\Route;
use wenbinye\tars\demo\servant\HelloServant;
use wenbinye\tars\protocol\annotation\TarsClient;
use wenbinye\tars\protocol\annotation\TarsParameter;
use wenbinye\tars\protocol\annotation\TarsReturnType;

$loader = require __DIR__ . '/../vendor/autoload.php';

$routeResolver = new InMemoryRouteResolver([
    $route = Route::fromString("PHPDemo.PHPTcpServer.HelloObj@tcp -h 127.0.0.1 -p 18081 -t 3000")
]);

$proxy = TarsClientImpl::builder()
    ->setRouteResolver($routeResolver)
       ->createProxy(HelloServant::class, $route->getServantName());
echo $proxy->hello("world, 2020\n");