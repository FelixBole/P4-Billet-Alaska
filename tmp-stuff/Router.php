<?php

class Router
{
    private $_view;
    private $_controller;

    /**
     * routeRequest
     *
     * Redirects to requested controller in url
     * 
     * Takes information from url, decomposes url and composes
     * the controller name accordingly to the existing file.
     * If the controller does not exist, it redirects to the 
     * home page by default.
     * 
     * @return void
     */
    public function routeRequest()
    {
        try {
            // Autoloading of models class'
            spl_autoload_register(function($class) {
                require_once('model' . DIRECTORY_SEPARATOR . $class . '.php');
            });

            // url variable
            $p = '';
            if (isset($_GET['p'])) {
                $p = explode('/', filter_var($_GET['p'], FILTER_SANITIZE_URL));
                $controller = ucfirst(strtolower($p[0]));
                $controllerClass = "Controller" . $controller;
                $controllerFile = "controller/" . $controllerClass . ".php";
                if (file_exists($controllerFile)) {
                    require_once($controllerFile);

                    // If ID is specified we send an array to the constructor
                    if (isset($_GET['id'])) {
                        $id = (int)$_GET['id'];
                        $parameters = array(
                            'id' => $id,
                            'p' => $p
                        );
                        $this->_controller = new $controllerClass($parameters);
                    } else {
                        $this->_controller = new $controllerClass($p);
                    }

                } else {
                    throw new Exception('Page non trouvée', 1);
                }
            } else {
                // Redirect to home page
                require_once('controller' . DIRECTORY_SEPARATOR . 'ControllerHome.php');
                $this->_controller = new ControllerHome();
            }
        } catch (Exception $e) {
            $errorMsg = $e->getMessage();
            $this->_view = new View('Error');
            $this->_view->generate(array('errorMsg' => $errorMsg));
        }
    }
}