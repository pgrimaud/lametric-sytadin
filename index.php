<?php

require __DIR__ . '/vendor/autoload.php';

use Lametric\Sytadin;

try {
    //sanitize parameters
    $parameters = array_map('htmlspecialchars', $_GET);

    //set init parameters
    $route = new Lametric\Sytadin\Route($parameters);
    $route->validateParameters();

} catch (Exception $e) {
    echo ':(';
}

echo '{
    "frames": [
        {
            "index": 0,
            "text": "Sytadin",
            "icon": "a2809"
        } 
    ] 
}';