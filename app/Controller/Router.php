<?php

namespace App\Controller;

use Core\Controller\Controller;
use Exception;

class RouteException extends Exception{}

class Router {
    public function routeRequest() {

        try {
            if (isset($_GET['p'])) {
                $page = $_GET['p'];
            } else {
                $page = 'chapter.index';
            }

            $page = explode('.', $page); // Makes array

            if (sizeof($page) !== 1 || sizeof($page) > 4) {

                if ($page[0] === 'admin') {
                    // Administration access
                    if (isset($page[1]) && isset($page[2])) {
                        $controller = '\App\Controller\Admin\\' . ucfirst($page[1]) . 'Controller';
                        $action = $page[2];
                    } else {
                        throw new RouteException('Specified request cannot exist, missing arguments', 404);
                    }

                } else {
                    // Normal user access
                    $controller = '\App\Controller\\' . ucfirst($page[0]) . 'Controller';
                    if (isset($page[1])) {
                        $action = $page[1];
                    } else {
                        throw new RouteException('Action is not defined', 404);
                    }
                }

            } else {
                throw new RouteException('Specified request cannot exist', 404);
            }

            // Create conroller and initialise method
            if (class_exists($controller)) {
                $controller = new $controller();

                // Chek if method exists
                if (method_exists($controller, $action)) {
                    $controller->$action();
                } else {
                    throw new RouteException('Method does not exist', 404);
                }
            } else {
                throw new RouteException('Controller does not exist', 404);
            }

        } catch (RouteException $e) {
            // Handle Exceptions
            // die($e->getMessage() . ' Captured with code : ' . $e->getCode() . '<br/>Caught On Line : ' . $e->getLine() . " of " . $e->getFile());
            $errorCtrl = new ErrorController;
            if ($e->getCode() === 404) {
                $errorCtrl->errorNotFound();
            } elseif ($e->getCode() === 403) {
                $errorCtrl->errorForbidden();
            }
        }
    }
}