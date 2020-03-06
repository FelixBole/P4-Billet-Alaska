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
        $html = substr($this->content, 0, 150);
        // Verify if the strings ends with a </p> or not (for tinyMCE)
        $tag = '</p>';
        $tagLength = strlen($tag);
        $checkHtmlEnd = (substr($html, 0, $tagLength) === $tag);

        if($checkHtmlEnd) {
            $html = '<div class="latestChapterSingleContent">' . substr($this->content,0, 150) . '...</div>';
        } else {
            // If it doesn't end with a </p> add an extra one
            $html = '<div class="latestChapterSingleContent">' . substr($this->content,0, 150) . '...</p></div>';
        }

        // die(var_dump($checkHtmlEnd));
        $html .=  
            '<p class="readMoreLinkContainer">
                <a href="' . $this->getURL() . '" class="readMoreLink">
                    <i class="fas fa-book-open"></i>
                    Lire le chapitre
                </a>
            </p>';

        return $html;
    }
}