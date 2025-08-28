<?php

require __DIR__.'/../vendor/autoload.php';

define('FRAMEWORK_START', microtime(true));

$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Arpon\Contracts\Http\Kernel::class);

$app->boot();

$request = Arpon\Http\Request::capture();

$response = $kernel->handle($request);

$response->send();