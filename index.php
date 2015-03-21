<?php
$loader = require 'vendor/autoload.php';
$f3 = \Cypher\Base\Utilities\Bootstrap::bootstrap();

/**
 * Routes
 */
$f3->map('/', 'Cypher\Cypher\Web\Index');


$f3->run();
