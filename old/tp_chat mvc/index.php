<?php

//Création de la session
session_start();

require "config.php";
require "modele.php";
$modele = new Modele($config['dsn'],$config['user'],$config['pass']);

//Préremplissage champ pseudo
if (isset ($_POST['form_pseudo'])) {
    $_SESSION['session_pseudo'] = $_POST['form_pseudo'];
}


try {
    $modele->insertMessage();
    $donnees = $modele->recuperationMessage();

    require "vue.php";
} catch (Exception $e) {
    echo "Une erreur existe" . $e->getMessage();
}
