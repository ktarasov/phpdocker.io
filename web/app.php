<?php

use Symfony\Component\Debug\Debug;
use Symfony\Component\HttpFoundation\Request;

/**
 * @var Composer\Autoload\ClassLoader
 */
$loader = require __DIR__ . '/../vendor/autoload.php';

// Capture app environment & enable debug on dev
$env = strtolower(getenv('SYMFONY_ENV') ?: 'prod');

if ($env === 'dev') {
    Debug::enable();
}

// Kernel & dispatch
$kernel   = new AppKernel($env, $env !== 'prod');
$request  = Request::createFromGlobals();
$response = $kernel->handle($request)->send();

$kernel->terminate($request, $response);
