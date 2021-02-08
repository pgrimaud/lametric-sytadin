<?php

use Lametric\{Response, Route};

require __DIR__ . '/../vendor/autoload.php';
$config = require_once __DIR__ . '/../config/parameters.php';

Sentry\init(['dsn' => $config['sentry_key']]);

try {
    //sanitize parameters
    $parameters = array_map('htmlspecialchars', $_GET);

    //set init parameters
    $route = new Route($parameters);
    $route->validateParameters();

    //api call
    $api  = new \Sytadin\Api();
    $data = $route->setApi($api);

    $response = new Response();
    $response->setBody($data);

    echo $response->returnResponse();

} catch (Exception $e) {
    $response = new Response();
    echo $response->returnError();
}