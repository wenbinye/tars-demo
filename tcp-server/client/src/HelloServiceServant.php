<?php

namespace app\servant;

use wenbinye\tars\protocol\annotation\TarsClient;
use wenbinye\tars\protocol\annotation\TarsParameter;
use wenbinye\tars\protocol\annotation\TarsReturnType;

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
