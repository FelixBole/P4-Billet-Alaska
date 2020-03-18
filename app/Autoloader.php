<?php

namespace App;

use Exception;

/**
 * Autoloader class registers all app namespace classes
 */
class Autoloader
{
    static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * Incluedes the corresponding file to the class
    * @param $class string the file name to load
    */
    static function autoload($class)
    {
        if (strpos($class, __NAMESPACE__ . '\\') === 0)
        {
            $class = str_replace(__NAMESPACE__ . '\\', '', $class);  
            $class = __DIR__ . DIRECTORY_SEPARATOR . $class . '.php';
            
            // Check that file exists before calling
            if(file_exists($class)) {
                require $class;
            } else {
                // throw new Exception('Class not existing, send to 404 here');
                die("The file {$class} could not be found!");

            }
        }
    }
}