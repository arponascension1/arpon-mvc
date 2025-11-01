<?php

use Arpon\Foundation\Application;
use Arpon\Http\Request;

define('BASE_PATH', dirname(__DIR__));




// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());
