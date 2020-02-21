<?php
/**
 * Comment class contains data from the comments table
 * 
 * @author Felix Bole <felix.bole@yahoo.fr>
 */
class Comment
{
    private $_id;
    private $_idChapter;
    private $_name;
    private $_message;
    private $_reports;
    private $_date;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    /**
     * hydrate
     *
     * Takes parameters in the array received and applies each corresponding value to the attributes of the object
     * 
     * @param  array $data
     *
     * @return void
     */
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    // Getters
    public function id() { return $this->_id; }
    public function idChapter() { return $this->_idChapter; }
    public function name() { return $this->_name; }
    public function message() { return $this->_message; }
    public function reports() { return $this->_reports; }
    public function date() { return $this->_date; }

    // Setters
    public function setId($id)
    {
        $id = (int)$id;
        if ($id > 0) {
            $this->_id = $id;
        }
    }

    public function setIdChapter($idChapter)
    {
        $idChapter = (int)$idChapter;
        if ($idChapter > 0) {
            $this->_chapter = $idChapter;
        }
    }

    public function setName($name) 
    {
        if (is_string($name)) {
            $this->_name = $name;
        }
    }

    public function setMessage($message) 
    {
        if (is_string($message)) {
            $this->_message = $message;
        }
    }

    public function setDate($date) 
    {
        $this->_date = $date;
    }

    public function setReports($reports)
    {
        $reports = (int)$reports;
        if ($reports > 0) {
            $this->_reports = $reports;
        }
    }
}