<?php
namespace App\Controller;

use Core\HTML\BootstrapForm;

/**
 * ChapterController
 * 
 */
class ChapterController extends AppController
{
    public function __construct() {
        parent::__construct();
        $this->loadModel('Chapter');
        $this->loadModel('Comment');

    }

    public function index() {
        $lastChapters = $this->Chapter->getLast(); // Allowed with the loadModel($model)
        $chapters = $this->Chapter->all();

        // send variables
        $this->render('chapter.index', compact('lastChapters', 'chapters'));
    }

    public function show() {
        $chapters = $this->Chapter->all();
        $chapter = $this->Chapter->find($_GET['id']);
        $comments = $this->Comment->getAllFromChapter($_GET['id']);

        // Check if there are previous of next chapters
        $nextChapter = null;
        $prevChapter = null;
        if(!empty($this->Chapter->exists($_GET['id'] + 1))) {
            $nextChapter = $this->Chapter->find($_GET['id'] + 1);
        }
        if(!empty($this->Chapter->exists($_GET['id'] - 1))) {
            $prevChapter = $this->Chapter->find($_GET['id'] - 1);
        }

        // $nextChapter = $this->Chapter->exists($_GET['id'] + 1);
        // $prevChapter = $this->Chapter->exists($_GET['id'] - 1);
        // Commenting form
        $form = new BootstrapForm();

        // send variables
        $this->render('chapter.show', compact('chapter', 'chapters', 'nextChapter', 'prevChapter', 'comments', 'form'));
    }

}