<?php

namespace App\Model;

use Core\Model\Model;

/**
 * CommentModel hanles data transmission with Comment class
 * 
 * It allows several different requests sent to the database
 * on the comments table. The results are sent back with 
 * data hydrating a new Comment object
 * 
 * @author Felix Bole <felix.bole@yahoo.fr>
 */
class CommentModel extends Model
{
    public function getAllFromChapter($id) {
        return $this->query(
            "SELECT com.id, com.id_chapter, com.name, com.message, com.date_created as date 
            FROM " . $this->table . " com 
            LEFT JOIN chapters cha 
            ON com.id_chapter = cha.id 
            WHERE com.id_chapter = ?
            ",[$id], false);
    }
}