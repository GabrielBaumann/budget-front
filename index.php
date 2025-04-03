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
$route->post("/ben", "Web:beneficiario");

$route->get("/ob", "Web:obras");
$route->post("/ob", "Web:obras");
$route->get("/mat", "Web:materiais");



// ROUTE
$route->dispatch();

ob_end_flush();