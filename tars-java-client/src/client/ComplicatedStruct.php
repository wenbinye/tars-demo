<?php

namespace app\servant\client;

use wenbinye\tars\protocol\annotation\TarsProperty;

final class ComplicatedStruct {
    /**
     * @TarsProperty(order = 0, required = true, type = "vector<SimpleStruct>")
     * @var array
     */
     public $ss;

    /**
     * @TarsProperty(order = 1, required = true, type = "SimpleStruct")
     * @var \app\servant\client\SimpleStruct
     */
     public $rs;

    /**
     * @TarsProperty(order = 2, required = true, type = "map<string, SimpleStruct>")
     * @var array
     */
     public $mss;

    /**
     * @TarsProperty(order = 3, required = false, type = "string")
     * @var string
     */
     public $str;

}