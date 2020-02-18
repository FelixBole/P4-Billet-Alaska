<?php
/**
 * ChapterManager handles the data transmission between the Chapter class and database
 * 
 * It allows to either get all information from the chapters database
 * or get a single specified chapter using a specified id
 * 
 * @author Felix Bole <felix.bole@yahoo.fr>
 */
class ChapterManager extends Model
{
    public function getChapters()
    {
        return $this->getAll('chapters', 'Chapter');
    }

    public function getChapter($id)
    {
        return $this->getOne('chapters', 'Chapter', $id);
    }
}