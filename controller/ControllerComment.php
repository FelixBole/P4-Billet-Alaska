<?php

class ControllerComment
{
    private $_commentManager;
    private $_view;

    public function __construct($data) {
        extract($data);
        $this->Addcomment();
    }

    public function Addcomment()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['name']) && !empty($_POST['message'])) {
                $id = (int)$_GET['id'];
                $name = htmlspecialchars($_POST['name']);
                $message = nl2br(htmlspecialchars($_POST['message']));
                
                $this->_commentManager = new CommentManager();
                $this->_commentManager->newComment($name, $message, $id);
            } else {
                //!!!
                echo 'err missing fields';
            }
        } else {
            echo 'err missing id';
        }
        header('Location: index.php?p=chapter&id=' . $_GET['id']);
    }
}