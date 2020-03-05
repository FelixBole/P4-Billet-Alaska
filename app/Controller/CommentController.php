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

            
            $errors = "";
            // Verify inputs
            if(empty($_POST['name']) || empty($_POST['message'])) {
                 $errors = "Merci de remplir les champs du formulaire";
            } else {
                $result = $this->Comment->create(
                    [
                        'id_chapter' => $_GET['id'],
                        'name' => htmlspecialchars($_POST['name']),
                        'message' => nl2br(htmlspecialchars( $_POST['message']))
                    ]
                );
                if($result) {
                    // Redirect to chapter with the newly added comment
                    return $this->show();
                }
            }
        }
        //-> Enhanced : Add an optional param to show($errors = null) and send it from here to pass errors to show
        $this->show($errors);
    }

    public function report() {
        $reports = $this->Comment->getReportsNumber($_POST['id']);

        // Add a report
        $reports = $reports->reports + 1;

        // Update
        $this->Comment->update($_POST['id'], [
            'reports' => $reports
        ]);

        return $this->show();
    }
}