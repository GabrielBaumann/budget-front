<?php

ob_start();

require __DIR__ . "/vendor/autoload.php";

// BOOTSTRAP

use CoffeeCode\Router\Router;

$route = new Router(url(), ":");

$route->namespace("Source\App");

$route->get("/", "Web:login");
$route->post("/", "Web:login");


$route->get("/ini", "App:inicio");
$route->get("/ben", "App:beneficiario");
$route->post("/ben", "App:beneficiario");

$route->get("/cad", "App:cadastroBeneficiario");
$route->get("/cad/{id}", "App:cadastroBeneficiario");
$route->post("/cad", "App:cadastroBeneficiario");

$route->get("/unidade", "App:unidadeMedida");
$route->get("/uni", "App:cadastroUnidade");
$route->get("/uni/{id}", "App:cadastroUnidade");
$route->post("/uni", "App:cadastroUnidade");

$route->get("/ob", "App:obras");
$route->post("/ob", "App:obras");
$route->get("/mat", "App:materiais");
$route->post("/mat", "App:materiais");


// ROUTE
$route->dispatch();

ob_end_flush();