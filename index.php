<?php

require __DIR__ . '/vendor/autoload.php';

use Lametric\Sytadin;

ini_set('display_errors', 1);

echo '<pre>';

try {
    //sanitize parameters
    $parameters = array_map('htmlspecialchars', $_GET);

    //set init parameters
    $route = new Lametric\Sytadin\Route($parameters);
    $route->validateParameters();

    //api call
    $api = new \Sytadin\Api();
    $route->getApiValues($api);
    
    echo 'ok';
} catch (Exception $e) {
    $response = new Lametric\Sytadin\Response();
    echo $response->returnError();
}