<?php

namespace App\Entity;

use Core\Entity\Entity;

/**
 * Chapter is one single object containing data from the chapters table
 * 
 * @author Felix Bole <felix.bole@yahoo.fr>
 */
class ChapterEntity extends Entity
{
    public function getUrl() {
        return 'index.php?p=chapter.show&id=' . $this->id;
    }

    public function getExcerpt() {
        $html = '<p>' . substr($this->content,0, 150) . '...</p>';
        $html .=  '<p><a href="' . $this->getURL() . '">Lire la suite</a></p>';
        return $html;
    }
}