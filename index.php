<?php

ob_start();

require __DIR__ . "/vendor/autoload.php";

// BOOTSTRAP

use CoffeeCode\Router\Router;

$route = new Router(url(), ":");
// var_dump("teste");
$route->namespace("Source\App");
$route->get("/", "Web:inicio");
$route->get("/ben", "Web:beneficiario");



// ROUTE
$route->dispatch();

ob_end_flush();