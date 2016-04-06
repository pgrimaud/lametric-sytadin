<?php

require_once __DIR__ . '/vendor/autoload.php';

$client = new \Goutte\Client();
$crawler = $client->request('GET', 'http://www.sytadin.fr/sys/barometres_de_la_circulation.jsp.html');

$crawler->filter('.barometre span.barometre_valeur')->each(function ($node) {
    print_r($node);
    $data = $node->text();
    //$data = str_replace("\n", '', $data);
    $data = str_replace("\r\n", '', $data);
    $data = str_replace(' ', '', $data);

    var_dump($data);
});