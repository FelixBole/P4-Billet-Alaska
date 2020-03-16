<?php

namespace App\Controller;

use App;
use Core\Auth\DBAuth;
use Core\HTML\BootstrapForm;

class UsersController extends AppController{

    public function login()
    {
        $errors = false;
        if(!empty($_POST)) {
            $auth = new DBAuth(App::getInstance()->getDb());
            if ($auth->login($_POST['username'], $_POST['password'])) {
                header('Location: index.php?p=admin.chapter.index');
            } else {
                $errors = true;
            }
        }
        $form = new BootstrapForm($_POST);
        $this->render('users.login', compact('form', 'errors'));
    }

    public function logout()
    {
        session_start();
        unset($_SESSION);
        session_destroy();
        session_write_close();
        header('Location: index.php');
        exit;
    }

}