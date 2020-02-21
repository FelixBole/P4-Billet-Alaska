<?php
/**
 * Chapter is a class containing data from the chapters table
 * 
 * @author Felix Bole <felix.bole@yahoo.fr>
 */
class Chapter
{
    private $_id;
    private $_chapter;
    private $_title;
    private $_content;
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
    
    /**
     * excerpt
     *
     * Creates an excerpt for the chapter content
     * 
     * @return string
     */
    public function excerpt() 
    { 
        return substr($this->_content, 0, 150) . '...';
    }

    // Getters
    public function id() { return $this->_id; }
    public function chapter() { return $this->_chapter; }
    public function title() { return $this->_title; }
    public function content() { return $this->_content; }
    public function date() { return $this->_date; }

    // Setters
    public function setId($id)
    {
        $id = (int)$id;
        if ($id > 0) {
            $this->_id = $id;
        }
    }

    public function setChapter($chapter)
    {
        $chapter = (int)$chapter;
        if ($chapter > 0) {
            $this->_chapter = $chapter;
        }
    }

    public function setTitle($title) 
    {
        if (is_string($title)) {
            $this->_title = $title;
        }
    }

    public function setContent($content) 
    {
        if (is_string($content)) {
            $this->_content = $content;
        }
    }

    public function setDate($date) 
    {
        $this->_date = $date;
    }
}