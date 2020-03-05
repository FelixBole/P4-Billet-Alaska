<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

class CommentController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Comment');
        $this->loadModel('Chapter');
    }

    public function index() {
        $chapters = $this->Chapter->all();

        $countComments = [];
        foreach($chapters as $chapter) {
            $countComments[$chapter->id] = $this->Comment->countAllFromChapter($chapter->id);
        }

        // die(var_dump($countComments));
        
        // send variables
        $this->render('admin.comment.index', compact('countComments', 'chapters'));
    }

    public function manage() {
        $comments = $this->Comment->listUnreported($_GET['id']);
        $reportedComments = $this->Comment->listReported($_GET['id']);

        // var_dump($reportedComments);
        $this->render('admin.comment.manage', compact('comments', 'reportedComments'));
    }

    public function delete() {
        if(!empty($_POST)) {
            $result = $this->Comment->delete($_POST['id']);
        }
        return $this->manage();
    }

    public function clear() {
        $result = $this->Comment->update($_POST['id'], [
            'reports' => 0
        ]);
        return $this->manage();
    }

}