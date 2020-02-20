<?php
require_once('view' . DIRECTORY_SEPARATOR . 'View.php');

/**
 * ControllerChapter
 * 
 * @author Felix Bole <felix.bole@yahoo.fr>
 */
class ControllerChapter
{
    private $_chapterManager;
    private $_view;

    public function __construct($id)
    {
        $id = $_GET["id"];
        //! Might need to handle potential errors here?
        $this->chapter($id);
    }

    /**
     * chapters
     *
     * Generates a view with the content of the chapters table
     * 
     * @return void
     */
    public function chapter($id)
    {
        $this->_chapterManager = new ChapterManager();
        $chapter = $this->_chapterManager->getChapter($id);
        $this->_view = new View('Chapter');
        $this->_view->generate(array('chapter' => $chapter));
    }
}