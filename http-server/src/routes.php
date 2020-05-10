<?php

/** @var \Slim\App $app */

use wenbinye\tars\demo\controllers\IndexController;

$app->get('/', IndexController::class . ':hello');
$app->get('/env', IndexController::class . ':env');

