<?php

namespace Core\Database;

use PDO;

class MysqlDatabase extends Database {

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $_db;

    public function __construct($db_name, $db_user = 'root', $db_pass = '', $db_host = 'localhost') {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    // ------------------------------------- Seperate access and different queries
    // In cas we use something else than PDO in the future

    public function getPDO() {
        // Check if database has been already instanciated to avoid doing many connections to database
        if($this->_db === null) {
            $db = new PDO('mysql:host=localhost;dbname=alaska;charset=utf8', 'root', '');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->_db = $db;
        }
        return $this->_db;
    }

    public function query($statement, $class_name = null, $one = false) {
        $req = $this->getPDO()->query($statement);

        // Verify type of sql request
        if(
            strpos($statement, 'UPDATE') === 0 ||
            strpos($statement, 'INSERT') === 0 ||
            strpos($statement, 'DELETE') === 0
        ) {
            return $req;
        }

        // If classname null return basic object
        if ($class_name === null) {
            $req->setFetchMode(PDO::FETCH_OBJ);
        } else {
            // die(var_dump($class_name));
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name); // Give it a class to instanciate
        }

        if($one) {
            $data = $req->fetch();
        } else {
            $data = $req->fetchAll();
        }
        return $data;
    }

    /**
     * prepare
     * 
     * @param string $statement SQL statement
     * @param mixed $attributes Dynamic attributes for a prepared statement
     * @param string $class_name The name of the object to instanciate
     * @param bool $one If we want a fetch or a fetchall
     * @return mixed|array 
     */
    public function prepare($statement, $attributes, $class_name = null, $one = false) {
        $req = $this->getPDO()->prepare($statement);
        $res = $req->execute($attributes); // returns bool

        // Check if the query is an update by looking through the first word of statament
        if(
            strpos($statement, 'UPDATE') === 0 ||
            strpos($statement, 'INSERT') === 0 ||
            strpos($statement, 'DELETE') === 0
        ) {
            return $res;
        }

        if ($class_name === null) {
            $req->setFetchMode(PDO::FETCH_OBJ);
        } else {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name); // Give it a class to instanciate
        }

        if($one) {
            $data = $req->fetch();
        } else {
            $data = $req->fetchAll();
        }
        return $data;
    }

    public function lastInsertId() {
        return $this->getPDO()->lastInsertId();
    }
}