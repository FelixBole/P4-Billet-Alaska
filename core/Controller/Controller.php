<?php

namespace Core\Controller;

class Controller {

    protected $viewPath; // Will be defined in the child controller
    protected $template;
 
    protected function render($view, $variables) {
        ob_start();
        // Extract sent variables
        extract($variables);
        require($this->viewPath . str_replace('.', DIRECTORY_SEPARATOR, $view) . '.php');
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
        die('Accès interdit');
    }

    protected function notFound() {
        header('HHTP/1.0 404 Not Found');
        die('Page not found');
    }

}