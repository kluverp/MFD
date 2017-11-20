<?php

// load the autoloader
require_once __DIR__ . '/autoload.php';

// load vendor autoloader
require __DIR__ . '/vendor/autoload.php';

// define namespace prefix
define('NS_PREFIX', 'Mfd');

// init new Multi-Function-Display
$mfd = new Mfd\Mfd();

// start application
$mfd->run();
