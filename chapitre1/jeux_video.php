<?php
if (isset ($_GET['console']))
{
    // Sous WAMP (Windows)
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

//Affichage classique prévu
//$reponse = $bdd->query('SELECT console, nom FROM jeux_video WHERE console="NES" OR console="PC" ORDER BY nom DESC LIMIT 4');

//Requete intéractive
    $requete = $bdd->prepare ('SELECT * FROM jeux_video WHERE console = ?');
    $requete->execute(array($_GET['console']));
//$requete->execute(array('PC'));

//requete classique prévu
//while ($donnees = $reponse->fetch())
//21:49
    while ($donnees = $requete->fetch())
    {
        echo '<p>' . $donnees['console'] . ' - ' . $donnees['nom'] .'</p>';
    }
}

?>