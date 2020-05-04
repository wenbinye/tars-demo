<?php


namespace wenbinye\tars\demo\controllers;


use DI\Annotation\Inject;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use wenbinye\tars\demo\client\HelloServant;

class IndexController
{
    /**
     * @Inject()
     * @var HelloServant
     */
    private $helloServant;

    public function hello(Request $request, Response $response, $args)
    {
        $message = $this->helloServant->hello($request->getQueryParams()['name'] ?? "tars");
        error_log("msg: $message");
        $response->getBody()->write($message ?? '');
        return $response;
    }
}