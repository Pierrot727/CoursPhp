<?php
namespace MonBlog;
use \MonBlog\Framework\Routeur;

class Autoloader {

    static function register () {
        spl_autoload_register(array(__CLASS__, 'autoload'));
            }

    static function autoload($class_name){
        $class = str_replace(__NAMESPACE__,'\\', $class);
        $class = str_replace('\\', '/', $class);
        require 'MonBlog/' . $class_name . '.php';

    }
}






// Contrôleur frontal : instancie un routeur pour traiter la requête entrante

$routeur = new Routeur();
$routeur->routerRequete();


