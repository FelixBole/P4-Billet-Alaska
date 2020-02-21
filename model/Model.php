<?php

/**
 * Model is a class that acts as a database connector for every class
 * 
 * Model creates objects defined in the project using the data received
 * from specified database. Every new class created will then easily
 * access the database for it's specific data table.
 * 
 * @author Felix Bole <felix.bole@yahoo.fr>
 */
abstract class Model
{
    private static $_db;

 
    /**
     * setDb
     *
     * Connect to database
     * 
     * @return void
     */
    private static function setDb()
    {
        self::$_db = new PDO('mysql:host=localhost;dbname=alaska;charset=utf8', 'root', '');
        self::$_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    /**
     * getDb
     *
     * Connects to the database by default, & connects if not connected initially
     * 
     * @return $_db
     */
    protected function getDb()
    {
        // Check if connection exists
        if (self::$_db == null) {
            self::setDb();
            // Reassign $_db to contain connection
            return self::$_db;
        }
    }

    /**
     * getLatest
     *
     * Takes in a certain table and creates new objects with the returned data
     * 
     * Lists the result by latest entry
     * 
     * @param  $table table
     *      table in database
     * @param  $object
     *      object to create
     *
     * @return array
     */
    protected function getLatest($table, $object)
    {
        $this->getDb();
        // Array containing the result data of all the table items
        $response = [];
        $req = self::$_db->prepare('SELECT * FROM ' . $table . ' ORDER BY date_creation DESC');
        $req->execute();

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $response[] = new $object($data);
        }

        return $response;
        $req->closeCursor();
    }

    /**
     * getAll
     *
     * Takes in a certain table and creates new objects with the returned data
     * 
     * @param  $table table
     *      table in database
     * @param  $object
     *      object to create
     *
     * @return array
     */
    protected function getAll($table, $object)
    {
        $this->getDb();
        // Array containing the result data of all the table items
        $response = [];
        $req = self::$_db->prepare('SELECT * FROM ' . $table . ' ORDER BY id');
        $req->execute();

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $response[] = new $object($data);
        }

        return $response;
        $req->closeCursor();
    }

    /**
     * getOne
     *
     * Returns a single entry from a specified table with a specific id
     * 
     * @param  mixed $table
     *      table in database
     * @param  mixed $object
     *      object to create
     * @param  int $id
     *      id of the table entry to return
     *
     * @return array
     */
    protected function getOne($table, $object, $id)
    {
        $this->getDb();
        $response = [];
        $req = self::$_db->prepare('SELECT id, chapter_number AS chapter, title, content, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh/%imin/%ss") 
            AS date 
            FROM ' . $table . '
            WHERE id = ?'
        );
        $req->execute(array($id));

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $response[] = new $object($data);
        }

        return $response;
        $req->closeCursor();
    }

    
}