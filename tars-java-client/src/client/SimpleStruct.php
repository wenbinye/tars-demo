<?php

namespace app\servant\client;

use wenbinye\tars\protocol\annotation\TarsProperty;

final class SimpleStruct {
    /**
     * @TarsProperty(order = 0, required = true, type = "long")
     * @var int
     */
     public $id = 0;

    /**
     * @TarsProperty(order = 1, required = true, type = "long")
     * @var int
     */
     public $count = 0;

    /**
     * @TarsProperty(order = 2, required = true, type = "short")
     * @var int
     */
     public $page = 0;

}