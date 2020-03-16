<?php

namespace App\Controller;

use Core\Controller\Controller;
use Exception;

class Router {

    public function routeRequest() {

        try {
            if(isset($_GET['p'])) {
                $p = $_GET['p'];
            } else {
                $p = 'chapter.index';
            }

            // Make an array to seperate view from action called
            $p = explode('.', $p);

            if(sizeof($p) !== 1) {

                // Admin access
                if($p[0] == 'admin') {
                    // Check if array has less than 3 values since all accessible pages have max of 3
                    if (sizeof($p) < 3) {
                        if (isset($p[1])) {
                            $controller = '\App\Controller\Admin\\' . ucfirst($p[1]) . 'Controller';
                            if (isset($p[2])) {
                                $action = $p[2];
                            } else {
                                throw new Exception('Action not defined', 404);
                            }
                        } else {
                            throw new Exception('Controller not defined', 404);
                        }
                    } else {
                        throw new Exception('Too many parameters', 404);
                    }

                    // User Access
                } else {
                    $controller = '\App\Controller\\' . ucfirst($p[0]) . 'Controller';
                    if (isset($p[1])) {
                        $action = $p[1];
                    } else {
                        throw new Exception('Action not defined', 404);
                    }
                }
            } else {
                // Since there are no pages accessible without an action specified, send to 404
                throw new Exception('Page unknown', 404);
            }
            
            // Create the called controller and initialise the method
            $controller = new $controller();
            $controller->$action();


        } catch (Exception $e) {
            if ($e->getCode() === 404) {
                header('Location: 404.php');
            }
        }

    }

}