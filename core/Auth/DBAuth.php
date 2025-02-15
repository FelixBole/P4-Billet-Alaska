<?php

namespace Core\Auth;

use Core\Database\Database;

/**
 * DBAuth 
 * 
 * Authentification using database
 */
class DBAuth {
    
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function getUserId()
    {
        if($this->logged()) {
            return $_SESSION['auth'];
        } else {
            return false;
        }
    }

    /**
     * Verifies if user exists in database
     * 
     * @param mixed $username 
     * @param mixed $password 
     * @return boolean 
     */
    public function login($username, $password) {
        $user = $this->db->prepare('SELECT * FROM users WHERE username = ?', [$username], null, true);
        if ($user) {
            if ($user->password === sha1($password)) {
                // Save user in session
                $_SESSION['auth'] = $user->id;
                return true;
            }
        } 
        return false;
    }

    /**
     * Verifies if user is already logged in
     * 
     * @return boolean 
     */
    public function logged() {
        return isset($_SESSION['auth']);
    }

}