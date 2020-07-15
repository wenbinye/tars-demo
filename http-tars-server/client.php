<?php

require __DIR__ . '/vendor/autoload.php';

use wenbinye\tars\rpc\route\InMemoryRouteResolver;
use wenbinye\tars\rpc\route\Route;
use wenbinye\tars\rpc\TarsClient;
use wenbinye\tars\demo\servant\HelloServant;


// $container = \kuiper\di\ContainerBuilder::create(__DIR__)->build();
// $container->get(\kuiper\db\QueryBuilderInterface::class);

$routeResolver = new InMemoryRouteResolver([
    Route::fromString("PHPDemo.PHPHttpTarsServer.HelloObj@tcp -h 127.0.0.1 -p 18089 -t 3000")
]);

$proxy = TarsClient::builder()
    ->setRouteResolver($routeResolver)
       ->createProxy(HelloServant::class, "PHPDemo.PHPHttpTarsServer.HelloObj");

// echo $proxy->subscribe("test", "tars://PHPDemo.PHPTcpServer.EventBusSubscriberObj");
// echo $proxy->unsubscribe("test", "tars://PHPDemo.PHPTcpServer.EventBusSubscriberObj");
echo $proxy->hello('123');
// echo $proxy->purge(3);
