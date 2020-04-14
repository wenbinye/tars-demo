<?php

namespace wenbinye\tars\demo\impl;

use kuiper\di\annotation\Service;
use wenbinye\tars\demo\servant\HelloServant;

/**
 * @Service()
 * Class HelloServiceImpl
 * @package app
 */
class HelloServantImpl implements HelloServant
{
    /**
     * @inheritDoc
     */
    public function hello($message)
    {
        return "hello, " . $message;
    }
}