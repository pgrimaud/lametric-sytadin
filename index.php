<?php

require __DIR__ . '/vendor/autoload.php';

try {
    //sanitize parameters
    $parameters = array_map('htmlspecialchars', $_GET);

    //set init parameters
    $route = new Lametric\Sytadin\Route($parameters);
    $route->validateParameters();

    //api call
    $api  = new \Sytadin\Api();
    $data = $route->setApi($api);

    $response = new Lametric\Sytadin\Response();
    $response->setBody($data);

    echo $response->returnResponse();

} catch (Exception $e) {
    $response = new Lametric\Sytadin\Response();
    echo $response->returnError();
}