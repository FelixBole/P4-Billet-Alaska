<?php

use Core\Database\MysqlDatabase;
use Core\Config;

/**
 * App class initialises the application
 * 
 * Init database connection
 * Init classes from app & core
 * Is the 'hub' of the project
 * 
 */
class App {

    // Static to be called anywhere in the app
    public $title = 'Alaska';
    private $db_instance;
    private static $_instance;

    public static function getInstance() {
        if(is_null(self::$_instance)) {
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public static function load() {
        session_start();
        require ROOT . DIRECTORY_SEPARATOR .  'app' . DIRECTORY_SEPARATOR . 'Autoloader.php';
        App\Autoloader::register();
        require ROOT . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'Autoloader.php';
        Core\Autoloader::register();
    }

    /// factory

    public function getTable($name) {
        $class_name = DIRECTORY_SEPARATOR . 'App' . DIRECTORY_SEPARATOR . 'Model' . DIRECTORY_SEPARATOR . ucfirst($name) . 'Model';
        return new $class_name($this->getDb()); // This getDb to do the connection with database (dependency injection)
    }

    public function getDb() {
        $config = Config::getInstance(ROOT . DIRECTORY_SEPARATOR . 'config/config.php');
        if(is_null($this->db_instance)) {
            $this->db_instance = new MysqlDatabase(
                $config->get('db_name'), 
                $config->get('db_user'), 
                $config->get('db_pass'), 
                $config->get('db_host')
            );
        }
        return $this->db_instance;
    }

}