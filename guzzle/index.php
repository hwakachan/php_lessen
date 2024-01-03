<?php
require '../../selfphp/vendor/autoload.php';

$cli = new GuzzleHttp\Client([
  'base_uri' => 'http://localhost/'
]);
$res = $cli->request('get', '/guzzle/test/test.html');
print $res->getBody();