<?php

use App\Controller\Router;

define('ROOT', dirname(__DIR__));


require ROOT . '/app/App.php';
App::load();

// Rooting now in Rooter class
$router = new Router;
$router->routeRequest();