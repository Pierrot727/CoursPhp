<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$requete = $bdd->prepare('SELECT nom, prix FROM jeux_video ORDER BY ?');
$requete->execute(array($_GET['nom']));


while ($donnees = $reponse->fetch())
{
    echo $donnees['nom'] . ' coûte ' . $donnees['prix'] . ' EUR<br />';
}

$reponse->closeCursor();

?>

