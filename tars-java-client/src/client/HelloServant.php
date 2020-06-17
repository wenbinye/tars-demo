<?php

/**
 * NOTE: This class is auto generated by Tars Generator (https://github.com/wenbinye/tars-generator).
 *
 * Do not edit the class manually.
 * Tars Generator version: 1.0-SNAPSHOT
 */

namespace wenbinye\tars\demo\client;

use wenbinye\tars\protocol\annotation\TarsClient;
use wenbinye\tars\protocol\annotation\TarsParameter;
use wenbinye\tars\protocol\annotation\TarsReturnType;

/**
 * @TarsClient(name="TestApp.HelloServer.HelloObj")
 */
interface HelloServant
{
    /**
     * @TarsParameter(name = "args0", type = "int")
     * @TarsParameter(name = "args1", type = "string")
     * @TarsReturnType(type = "string")
     *
     * @param int $no
     * @param string $name
     * @return string
     */
    public function hello($no, $name);

}
