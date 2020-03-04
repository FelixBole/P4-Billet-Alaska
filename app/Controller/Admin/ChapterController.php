<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

class ChapterController extends AppController {

    public function __construct() {
        parent::__construct();

        // Loading model avoids having to App::getInstance()->getTable('Chapter')
        $this->loadModel('Chapter');
    }

    public function index() {
        $lastChapters = $this->Chapter->getLast();
        $chapters = $this->Chapter->all();

        // send variables
        $this->render('admin.chapter.index', compact('lastChapters', 'chapters'));
    }

    public function new() {

        // Update to database
        if(!empty($_POST)) {

            $result = $this->Chapter->create(
                [
                    'title' => $_POST['title'],
                    'content' => $_POST['content']
                ]
            );
            if ($result) {
                // header('Location: admin.php');
                return $this->index();
            }
        }

        $form = new BootstrapForm($_POST);
        $this->render('admin.chapter.edit', compact('form'));
    }

    public function edit() {
        // Update to database
        if(!empty($_POST)) {

            $result = $this->Chapter->update(
                $_GET['id'],
                [
                    'title' => $_POST['title'],
                    'content' => $_POST['content']
                ]
            );
            if ($result) {
                return $this->index();
            }

        }

        $chapter = $this->Chapter->find($_GET['id']);

        $form = new BootstrapForm($chapter);
        $this->render('admin.chapter.edit', compact('form'));
    }

    public function delete() {

        // Update to database
        if(!empty($_POST)) {
            $result = $this->Chapter->delete($_POST['id']); // Too dangerous to get the id in get
            return $this->index();
            // header('Location: admin.php');
            // var_dump($result);
        }
    }

}