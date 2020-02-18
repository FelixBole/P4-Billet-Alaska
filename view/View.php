<?php

/**
 * View Class handles the selection of the correct view
 * 
 * View class generates data to be sent to the correct
 * view when it is requested
 * 
 * @author Felix Bole <felix.bole@yahoo.fr>
 */
class View
{
    private $_file;
    private $_pageTitle;

    public function __construct($action) {
        $this->_file = 'view' . DIRECTORY_SEPARATOR . 'view' . $action . '.php';
    }

    /**
     * generate
     *
     * Uses data sent by the controller to generate the needed content for the view
     * 
     * Creates the content received by the data
     * Uses the content to hydrate the view
     * 
     * @param  array $data
     *
     * @return void
     */
    public function generate($data)
    {
        $content = $this->generateFile($this->_file, $data);
        $view = $this->generateFile('view' . DIRECTORY_SEPARATOR . 'template.php', array(
            'title' => $this->_pageTitle,
            'content' => $content
        ));
        
        echo $view;
    }

    /**
     * generateFile
     *
     * Generates the requested files
     * 
     * @param  string $file
     * @param  array $data
     *
     * @return void
     */
    public function generateFile($file, $data)
    {
        if (file_exists($file)) {
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        } else {
            throw new Exception("Fichier " . $file . " non trouvé.", 1);
        }
    }
}