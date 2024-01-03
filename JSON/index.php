<?php
require '../../selfphp/vendor/autoload.php';

$cli = new GuzzleHttp\Client([
  'base_uri' => 'http://localhost/'
]);
$res = $cli->get('/JSON/sample.json');
$obj = json_decode($res->getBody());
print_r($obj);