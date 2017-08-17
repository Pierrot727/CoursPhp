<?php

if (isset($_POST['pseudo']) && !empty($_POST['pseudo']) && isset($_POST['message']) && !empty($_POST['message'])) 
{
	//se prémunir contre les failles XSS
	$pseudo = htmlspecialchars($_POST['pseudo']);
	$message = htmlspecialchars($_POST['message']);
	//Ajouter d'autres validations des variables d'entrée ici... On considère que l'entrée a passé la validation si aucune n'est laissée vide (fonction empty ci-dessus):
	$invalidEntry=0;

// Si pas de cookie "pseudo" ou que le pseudo de l'utilisateur a changé, on écrit/modifie le cookie pseudo.
	if (!isset($_COOKIE['pseudo']) || $_COOKIE['pseudo']!=$pseudo)
	setcookie('pseudo', $pseudo, time() + 365*24*3600, null, null, false, true); 

//connexion BDO
    try {
    	$bdd = new PDO('mysql:host=localhost;dbname=openclassrooms;charset=utf8','root','');	
    } 

    catch (Exception $e) {
    	die('Erreur : '.$e->getMessage());	
    }

//preparation de la requete avec les variables d'entrée, plus on insère la date courante avec NOW():
	$req = $bdd->prepare('INSERT INTO minichat(pseudo, message, date_message) VALUES(:pseudo, :message, NOW())');
    
//excution de la requete en utilisant les variables "sécurisées anti failles XSS"
    $req->execute(array(
    	'pseudo' => $pseudo,
    	'message' => $message
    	));
    	
}

else {
	//on ne fait rien, juste informer mininchat.php que l'entrée est invalide:
	$invalidEntry=1;
}


// rediriger vers minichat.php comme ceci :
header('Location: minichat.php?invalidEntry=' . $invalidEntry);

?>