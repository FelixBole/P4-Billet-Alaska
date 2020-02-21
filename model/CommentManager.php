<?php
/**
 * CommentManager hanles data transmission with Comment class
 * 
 * It allows several different requests sent to the database
 * on the comments table. The results are sent back with 
 * data hydrating a new Comment object
 * 
 * @author Felix Bole <felix.bole@yahoo.fr>
 */
class CommentManager extends Model
{
    public function getComments()
    {
        return $this->getAll('comments', 'Comment');
    }

    public function getComment($id)
    {
        return $this->getOne('comments', 'Comment', $id);
    }

    /**
     * getChapterComments
     *
     * gets all comments for a specific chapter
     * 
     * @param  int $id
     *
     * @return new Chapter
     */
    public function getChapterComments($id)
    {
        $this->getDb();
        $response = [];
        $req = parent::$_db->prepare('SELECT chapters.id, comments.*
            FROM comments
            LEFT JOIN chapters
            ON (chapters.id = comments.id_chapter)
            WHERE chapters.id = ?
        ');
        $req->execute(array($id));

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $response[] = new Comment($data);
        }

        return $response;
        $req->closeCursor();
    }


    //!!! Not working
    public function newComment($name, $message, $id_chapter)
    {
        $this->getDb();
        $req = parent::$_db->query(
            'INSERT INTO comments
            (id_chapter, name, message, date_created)
            VALUES (' . $id_chapter . ', ' . $name . ', ' . $message . ', NOW())'
        );
    }
}