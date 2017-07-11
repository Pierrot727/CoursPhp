<?php
$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
//Je récupére le pseudo et le message envoyé par le formulaire en GET et le stock en donnees
 if (isset ($_GET['f_pseudo']) && isset ($_GET['f_message']))
 {
     $requete = $bdd->prepare ('INSERT INTO `mini_chat`(`pseudo`, `message`) VALUES (?,?)');
     $requete->execute(array($_GET['f_pseudo'],$_GET['f_message']));
 }

 header('Location:mini_chat.php');

?>