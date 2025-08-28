<?php
define('BASE_PATH', realpath(__DIR__.'/../'));

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new application instance
| which serves as the "glue" for all the components of our framework,
| and is the IoC container for the system binding all of the various parts.
|
*/
$app = new Arpon\Foundation\Application(
    realpath(__DIR__.'/../')
);
/*
|--------------------------------------------------------------------------
| Bootstrap The Application
|--------------------------------------------------------------------------
|
| Here we will bootstrap the application by running the necessary
| bootstrappers to load environment variables, configuration, etc.
|
*/
$app->bootstrapWith([
    Arpon\Foundation\Bootstrap\LoadEnvironmentVariables::class,
    Arpon\Foundation\Bootstrap\LoadConfiguration::class,
    Arpon\Foundation\Bootstrap\RegisterProviders::class,
]);
/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

return $app;