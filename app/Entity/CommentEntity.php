<?php

namespace App\Entity;

use Core\Entity\Entity;

/**
 * Comment is one single object containing data from the comments table
 * 
 * @author Felix Bole <felix.bole@yahoo.fr>
 */
class CommentEntity extends Entity
{
    public function getUrl() {
        return 'index.php?p=chapter.comment&id=' . $this->id;
    }
}