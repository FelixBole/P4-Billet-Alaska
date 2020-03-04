<?php

namespace App\Controller\Admin;

use App;
use App\Controller\AppController as ControllerAppController;
use Core\Auth\DBAuth;

class AppController extends ControllerAppController {
 
    public function __construct()
    {
        parent::__construct();

        // Verify authentification
        $app = App::getInstance();
        $auth = new DBAuth($app->getDb());
        if(!$auth->logged()) {
            $this->forbidden();
        }
    }

}