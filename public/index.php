<?php

define('ROOT', dirname(__DIR__));


require ROOT . '/app/App.php';
App::load();

if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 'chapter.index';
}

$p = explode('.', $p);

if($p[0] == 'admin') {
    $ctrl = '\App\Controller\Admin\\' . ucfirst($p[1]) . 'Controller';
    $action = $p[2];
} else {
    $ctrl = '\App\Controller\\' . ucfirst($p[0]) . 'Controller';
    $action = $p[1];
}

$ctrl = new $ctrl();
$ctrl->$action();