<?php
namespace Blog;
use Blog\Framework\Routeur;

require_once "Autoloader.php";



// Contrôleur frontal : instancie un routeur pour traiter la requête entrante



Autoloader::register();

$routeur = new Routeur();
$routeur->routerRequete();


