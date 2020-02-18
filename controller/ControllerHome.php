<?php
require_once('view' . DIRECTORY_SEPARATOR . 'View.php');

/**
 * ControllerHome class handles data generation for the Home view
 * 
 * ControllerHome recuperates the data from the chapters table
 * and implements it in the associated view (here ViewHome)
 * 
 * @author Felix Bole <felix.bole@yahoo.fr>
 */
class ControllerHome
{
    private $_chapterManager;
    private $_view;

    public function __construct($p)
    {
        //! Might need to handle potential errors here?
        $this->chapters();
    }

    /**
     * chapters
     *
     * Generates a view with the content of the chapters table
     * 
     * @return void
     */
    public function chapters()
    {
        $this->_chapterManager = new ChapterManager();
        $chapters = $this->_chapterManager->getChapters();
        $this->_view = new View('Home');
        $this->_view->generate(array('chapters' => $chapters));
    }
}