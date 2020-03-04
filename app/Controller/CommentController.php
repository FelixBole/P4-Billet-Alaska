<?php
namespace App\Controller;

use Core\HTML\BootstrapForm;

/**
 * CommentController
 * 
 */
class CommentController extends ChapterController
{
    public function newComment() {
        if(!empty($_POST)) {
            $result = $this->Comment->create(
                [
                    'id_chapter' => $_GET['id'],
                    'name' => $_POST['name'],
                    'message' => $_POST['message']
                ]
            );
            if($result) {
                // Redirect to chapter with the newly added comment
                return $this->show();
            }
        }

        $form = new BootstrapForm($_POST);
        $this->render('chapter.show', compact('form'));
    }
}