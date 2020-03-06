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

    public function show($err = null, $success = null) {
        $chapters = $this->Chapter->all();
        $chapter = $this->Chapter->find($_GET['id']);
        $comments = $this->Comment->getAllFromChapter($_GET['id']);

        // Check if there are previous of next chapters
        $nextChapter = $this->Chapter->next($_GET['id']); // Returns either false or the entity object
        $prevChapter = $this->Chapter->previous($_GET['id']);

        // Commenting form
        $form = new BootstrapForm($_POST);

        // Get potential messages
        $errors = $err;
        $commentConfirm = $success;

        // send variables
        $this->render('chapter.show', compact('chapter', 'chapters', 'nextChapter', 'prevChapter', 'comments', 'form', 'errors', 'commentConfirm'));
    }

}