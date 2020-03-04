<?php

namespace Core;

/**
 * Autoloader class registers all Core namespace classes
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
              $class = str_replace('\\', '/', $class);
              require __DIR__ . DIRECTORY_SEPARATOR . $class . '.php';
          }
        //   require __DIR__ . DIRECTORY_SEPARATOR . $class . '.php';
      }
}