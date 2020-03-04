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

    public function report() {
        $reports = $this->Comment->getReports($_POST['id']);

        // Add a report
        $reports = $reports->reports + 1;

        // Update
        $this->Comment->update($_POST['id'], [
            'reports' => $reports
        ]);

        return $this->show();
    }
}