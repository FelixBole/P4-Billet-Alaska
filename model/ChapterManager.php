<?php
/**
 * ChapterManager handles the data transmission between the Chapter class and database
 * 
 * It allows to either get all information from the chapters database
 * or get a single specified chapter using a specified id
 * it then returns this data to create a Chapter object with it
 * 
 * @author Felix Bole <felix.bole@yahoo.fr>
 */
class ChapterManager extends Model
{
    public function getLatestChapters()
    {
        return $this->getLatest('chapters', 'Chapter');
    }

    public function getChapters()
    {
        return $this->getAll('chapters', 'Chapter');
    }

    public function getChapter($id)
    {
        // Could use 
        // return $this->getOne('chapters', 'Chapter', $id);

        $this->getDb();
        $response = [];
        $req = parent::$_db->prepare('SELECT id, chapter_number AS chapter, title, content, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh/%imin/%ss") 
            AS date 
            FROM chapters
            WHERE id = ?'
        );
        $req->execute(array($id));

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $response[] = new Chapter($data);
        }

        return $response;
        $req->closeCursor();
    }

    public function getNextChapter($id)
    {
        $this->getDb();
        $response = [];
        $req = parent::$_db->prepare('SELECT id, chapter_number AS chapter, title, content, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh/%imin/%ss") AS date 
            FROM chapters
            WHERE id > ?
            ORDER BY id
            LIMIT 1'
        );
        $req->execute(array($id));

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $response[] = new Chapter($data);
        }

        return $response;
        $req->closeCursor();
    }

    public function getPreviousChapter($id)
    {
        $this->getDb();
        $response = [];
        $req = parent::$_db->prepare('SELECT id, chapter_number AS chapter, title, content, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh/%imin/%ss") AS date 
            FROM chapters
            WHERE id < ?
            ORDER BY id
            LIMIT 1'
        );
        $req->execute(array($id));

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $response[] = new Chapter($data);
        }

        return $response;
        $req->closeCursor();
    }
}