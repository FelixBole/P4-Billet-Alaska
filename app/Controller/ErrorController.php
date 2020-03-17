<?php

namespace App\Controller;

class ErrorController extends AppController {

    public function errorNotFound() {
        require(ROOT . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'View' . DIRECTORY_SEPARATOR . 'error' . DIRECTORY_SEPARATOR . 'error_404.php');
    }

    public function errorForbidden() {
        require(ROOT . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'View' . DIRECTORY_SEPARATOR . 'error' . DIRECTORY_SEPARATOR . 'error_403.php');
    }
}