<?php


namespace wenbinye\tars\demo\controllers;


use DI\Annotation\Inject;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use wenbinye\tars\demo\client\HelloServant;
use wenbinye\tars\server\Config;

class IndexController implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    /**
     * @Inject()
     * @var HelloServant
     */
    private $helloServant;

    public function hello(Request $request, Response $response, $args)
    {
        $message = $this->helloServant->hello($request->getQueryParams()['name'] ?? "tars");
        $this->logger->info("get message $message");
        $response->getBody()->write($message ?? '');
        return $response;
    }

    public function env(Request $request, Response $response)
    {
        $response->getBody()->write(json_encode(Config::getInstance()->toArray()['tars']));

        return $response->withHeader("content-type", "application/json");
    }
}