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
     * @GetMapping("/env")
     */
    public function env()
    {
        $this->response->getBody()->write(json_encode(
            Config::getInstance()->toArray()['tars'],
            JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES));
    }
}