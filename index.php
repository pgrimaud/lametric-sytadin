<?php

require __DIR__ . '/vendor/autoload.php';

use Lametric\Sytadin;

try {
    //sanitize parameters
    $parameters = array_map('htmlspecialchars', $_GET);

    //set init parameters
    $transport = new Lametric\Sytadin\Route($parameters);
    
} catch (Exception $e) {

}