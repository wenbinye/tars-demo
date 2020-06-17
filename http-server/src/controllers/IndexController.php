<?php


namespace wenbinye\tars\demo\controllers;


use DI\Annotation\Inject;
use kuiper\di\annotation\Controller;
use kuiper\web\AbstractController;
use kuiper\web\annotation\GetMapping;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use wenbinye\tars\demo\client\HelloServant;
use wenbinye\tars\server\Config;

/**
 * @Controller()
 */
class IndexController extends AbstractController implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    /**
     * @Inject()
     * @var HelloServant
     */
    private $helloServant;

    /**
     * @GetMapping("/")
     */
    public function hello()
    {
        $message = $this->helloServant->hello($this->request->getQueryParams()['name'] ?? "tars");
        $this->logger->info("get message $message");
        $this->response->getBody()->write($message ?? '');
    }

    /**
     * @GetMapping("/env")
     */
    public function env()
    {
        $this->response->getBody()->write(json_encode(Config::getInstance()->toArray()['tars']));
    }
}