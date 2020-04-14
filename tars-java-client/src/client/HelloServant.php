<?php

namespace app\servant\client;

use wenbinye\tars\protocol\annotation\TarsClient;
use wenbinye\tars\protocol\annotation\TarsParameter;
use wenbinye\tars\protocol\annotation\TarsReturnType;

/**
 * @TarsClient(name="TestApp.HelloServer.HelloObj")
 */
interface HelloServant {
    /**
     * @TarsParameter(name = "no", type = "int")
     * @TarsParameter(name = "name", type = "string")
     * @TarsReturnType(type = "string")
     *
     * @param int $no
     * @param string $name
     * @return string
     */
    public function hello($no, $name);

}
