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

    public function countAllFromChapter($id) {
        $res = $this->query("SELECT COUNT(*) as commentsAmount 
            FROM comments com 
            LEFT JOIN chapters cha
            ON com.id_chapter = cha.id
            WHERE com.id_chapter = ?
            ", [$id], false);
        // extract($res);
        // die(var_dump($res[0]->commentsAmount));
        return $res[0]->commentsAmount;
    }

    public function getReportsNumber($id) {
        // Look for reports where the id is the comment id
        return $this->query("SELECT reports FROM comments WHERE id = ?", [$id], true);
    }

    public function getReports($id) {
        // ChapterId
        return $this->query("SELECT reports FROM comments WHERE id_chapter = ?", [$id], true);
    }

    public function listReported($id) {
        // $id has to be the chapterId
        return $this->query("SELECT * FROM comments WHERE id_chapter = ? AND reports > 0 ORDER BY reports DESC", [$id], false);
    }

    public function listUnreported($id) {
        // $id has to be the chapterId
        return $this->query("SELECT * FROM comments WHERE id_chapter = ? AND reports = 0", [$id], false);
    }

    public function deleteAllFromChapter($id) {
        return $this->query("DELETE FROM comments WHERE id_chapter = ?", [$id], false);
    }
}