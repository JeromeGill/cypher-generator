#!/usr/bin/env php
<?php
$loader = require __DIR__.'/../vendor/autoload.php';
$f3 = \Cypher\Base\Utilities\Bootstrap::bootstrap();

$cyphers = new \Cypher\Cypher\Model\Cyphers($f3->get('DB'));

for($i = 0; $i<100; $i++)
{
    $cyphers->addCypher(\Cypher\Cypher\Utilities\GenerateCypher::generateCypher());
}