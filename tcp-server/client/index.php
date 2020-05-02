<?php

use wenbinye\tars\rpc\route\InMemoryRouteResolver;
use wenbinye\tars\rpc\TarsClient as TarsClientImpl;
use wenbinye\tars\rpc\route\Route;
use wenbinye\tars\protocol\annotation\TarsClient;
use wenbinye\tars\protocol\annotation\TarsParameter;
use wenbinye\tars\protocol\annotation\TarsReturnType;

$loader = require __DIR__ . '/../vendor/autoload.php';

/**
 * @TarsClient(name="PHPTest.PHPTcpServer.HelloObj")
 */
interface HelloServiceServant {
    /**
     * @TarsParameter(name = "message", type = "string")
     * @TarsReturnType(type = "string")
     *
     * @param string $message
     * @return string
     */
    public function hello($message);
}

$routeResolver = new InMemoryRouteResolver([
    Route::fromString("PHPTest.PHPTcpServer.HelloObj@tcp -h 127.0.0.1 -p 18081 -t 3000")
]);

$proxy = TarsClientImpl::builder()
    ->setRouteResolver($routeResolver)
    ->createProxy(HelloServiceServant::class);
echo $proxy->hello("world, 2020\n");