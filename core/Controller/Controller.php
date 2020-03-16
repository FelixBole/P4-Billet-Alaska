<?php

namespace Core\Controller;

class Controller {

    protected $viewPath; // Will be defined in the child controller
    protected $template;
 
    protected function render($view, $variables) {
        ob_start();
        
        $file = $this->viewPath . str_replace('.', DIRECTORY_SEPARATOR, $view) . '.php';
        // Check if file exists
        if (file_exists($file)) {
            // Extract sent variables
            extract($variables);
            require ($file);
        } else {
            die('send to 404 in core controller here'); // # It never gets here because errors are handled before
            require (ROOT . DIRECTORY_SEPARATOR .  'View' . DIRECTORY_SEPARATOR . 'error' . DIRECTORY_SEPARATOR . 'error_404');
        }

        $content = ob_get_clean();
        require($this->viewPath . 'templates/' . $this->template . '.php');
    }

    /**
     * Called when admin is not connected
     * 
     * @return void 
     */
    protected function forbidden() {
        header('HHTP/1.0 403 Forbidden');
        die('Accès interdit, retour à l\'accueil : <a href="index.php"> Accueil </a>');
    }

    protected function notFound() {
        header('Location: 404.php');
        die('Page not found');
    }

}