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
        $chapter = $this->Chapter->find($_GET['id']);
        $comments = $this->Comment->getAllFromChapter($_GET['id']);

        // Commenting form
        $form = new BootstrapForm();

        // send variables
        $this->render('chapter.show', compact('chapter', 'comments', 'form'));
    }

}