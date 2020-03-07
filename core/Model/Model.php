<?php

namespace Core\Model;

use Core\Database\Database;

/**
 * Model is a class that acts as a database connector for every class
 * 
 * Model creates objects defined in the project using the data received
 * from specified database. Every new class created will then easily
 * access the database for it's specific data table.
 * 
 * @author Felix Bole <felix.bole@yahoo.fr>
 */
abstract class Model {


    protected $table;
    protected $db;

    public function __construct(Database $db) 
    {

        $this->db = $db;

        // Verify if table name is defined
        if (is_null($this->table)) {
            $parts = explode(DIRECTORY_SEPARATOR, get_class($this));
            $class_name = end($parts);
            $this->table = strtolower(str_replace('Model', '', $class_name)) . 's'; // Take away the "Model" from the name and add s
            // ex : ChapterModel -> chapters
        }
    }

    /**
     * Returns all the records in a table
     * 
     * @return array
     */
    public function all()
    {
        return $this->query('SELECT * FROM ' . $this->table . ' ORDER BY id');
    }

    /**
     * Finds a specific record in db
     * 
     * @param int $id The id of the record to find
     * @return object 
     */
    public function find($id)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], true);
    }

    /**
     * Updates a record in db
     * 
     * @param int $id The id of the field to update
     * @param array $fields The fields to update
     */
    public function update($id, $fields)
    {
        $sql_parts = [];
        $attributes = [];
        foreach($fields as $k => $v) {
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }

        // Add id of chapter to update to fields
        $attributes[] = $id;
        
        $sql_fields = implode(', ',$sql_parts);

        return $this->query("UPDATE {$this->table} SET $sql_fields WHERE id = ?", $attributes, true);
    }

    /**
     * Creates a new entry in db
     * 
     * @param array $fields The fields to add in the new entry
     */
    public function create($fields)
    {
        $sql_parts = [];
        $attributes = [];
        foreach($fields as $k => $v) {
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        
        $sql_fields = implode(', ',$sql_parts);

        return $this->query("INSERT INTO {$this->table} SET $sql_fields", $attributes, true);
    }

    /**
     * Deletes a record
     * 
     * @param int $id The id of the field to delete
     */
    public function delete($id)
    {
        // var_dump($this->table, $id);
        // die();
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id], true);
    }

    // Not used as of right now
    public function extractList($key, $value) 
    {
        $records = $this->all();
        $return = [];
        foreach ($records as $v) {
            $return[$v->$key] = $v->$value;
        }
        return $return;
    }

    /**
     * A simpler query that automatically detects a query from a prepare
     * 
     * @param string $statement SQL statement
     * @param array|null $attributes the attributes for a prepared statement
     * @param bool $one if we want either one or several results
     * @return mixed 
     */
    public function query($statement, $attributes = null, $one = false) 
    {
        if ($attributes) {
            return $this->db->prepare(
                $statement, 
                $attributes,  
                str_replace('Model', 'Entity', get_class($this)), // Replaces the Model at the end of the class name with Entity
                $one
            );
        } else {
            // die(var_dump(str_replace('Model', 'Entity', get_class($this))));
            return $this->db->query(
                $statement,  
                str_replace('Model', 'Entity', get_class($this)), // Replaces the Model at the end of the class name with Entity
                $one
            );
        }
    }
    
    /**
     * Checks if a record exists given a specific id
     * 
     * @param int $id The $id of the record to check
     * @return mixed returns the entity or false
     */
    public function exists($id) {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], true);
    }

    /**
     * Finds the previous record in the table from the given id
     * 
     * @param int $id The id of the starting point
     * @return mixed returns either the entity or false
     */
    public function previous($id) {
        return $this->query("SELECT * FROM {$this->table} WHERE id = (SELECT MAX(id) FROM {$this->table} WHERE id < ?)", [$id], true);
    }

    /**
     * Finds the next record in the table from the given id
     * 
     * @param int $id The id of the starting point
     * @return mixed returns either the entity or false
     */
    public function next($id) {
        return $this->query("SELECT * FROM {$this->table} WHERE id = (SELECT MIN(id) FROM {$this->table} WHERE id > ?)", [$id], true);
    }

}