<?php

namespace App\Controller;

use App;
use Core\Controller\Controller;

class AppController extends Controller {

    protected $template = 'default';

    public function __construct() {
        $this->viewPath = ROOT . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'View' . DIRECTORY_SEPARATOR;
    }

    public function loadModel($model)
    {
        $this->$model = App::getInstance()->getTable($model);
    }

}