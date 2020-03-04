<?php

namespace App\Model;

use Core\Model\Model;

/**
 * ChapterModel handles the data transmission between the Chapter class and database
 * 
 * It allows to either get all information from the chapters database
 * or get a single specified chapter using a specified id
 * it then returns this data to create a Chapter object with it
 * 
 * @author Felix Bole <felix.bole@yahoo.fr>
 */
class ChapterModel extends Model
{
    protected $table = 'chapters';

    /**
     * Gets the latest chapters
     * @return array 
     */
    public function getLast() {
        return $this->query('SELECT * FROM chapters ORDER BY date_creation DESC');
    }
}