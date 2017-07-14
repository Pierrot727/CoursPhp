<?php
//Création de la session
session_start();

//Préremplissage champ pseudo
if(isset ($_POST['form_pseudo'])){
    $_SESSION['session_pseudo'] = $_POST['form_pseudo'];}


//Accés à la base de donnée (wamp server windows)
$bdd = new PDO ('mysql:host=localhost;dbname=tp_minichat;charset=utf8', 'root', "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

//Insertion dans la base à l'aide d'une requete préparée et test si existe
if (isset ($_POST['form_pseudo']) && isset ($_POST['form_message'])) {
    $req = $bdd->prepare('INSERT INTO mini_chat (pseudo, message,heure) VALUES(?, ?, now())');
    $req->execute(array($_POST['form_pseudo'], $_POST['form_message']));
}

//Recupération des 5 derniers messages
$donnees = $bdd->query('SELECT id,pseudo, message, heure FROM mini_chat ORDER BY ID DESC LIMIT 5 ')->fetchAll();

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mini-chat</title>
</head>
<body>
<form method="POST">
    <div class="formulaire">
        <div class="child">
            <p>
            <h1>Mini-chat</h1>
            </p>
        </div>
        <div class="child">
            <p>
                <label for=form_pseudo"> Entrez votre pseudo </label>
                <input id="form_pseudo" type="text" name="form_pseudo" value=<?php echo if(isset($_SESSION['session_pseudo'])? $_SESSION['session_pseudo']; ?>>
            </p>
            <p>
                <label for="form_message"> Entrez votre message </label>
                <input id="form_message" name="form_messsage">
            </p>
        </div>
        <div class="child">
            <p>
                <input type="submit"/>
            </p>
        </div>
    </div>
</form>
<div class="message">
    <?php

    //Affichage des messages
    foreach ($donnees as $valeur) {
        echo "[" . $valeur['heure'] . "] ";
        echo '<strong>' . $valeur['pseudo'] . '</strong> : ';
        echo $valeur['message'] . '</BR>';
    }

    ?>
</div>
</body>
</html>

