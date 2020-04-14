<?php

use wenbinye\tars\server\framework\Slim;
use wenbinye\tars\server\ServerApplication;

$loader = require __DIR__ . '/../vendor/autoload.php';

ServerApplication::run(new Slim($loader, ["wenbinye\\tars\\demo\\"]));
