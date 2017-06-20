<?php
$bdd = new PDO ('mysql:host=localhost;dbname=tp_espace_membres;charset=utf8', 'root', "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

// Vérification
if (isset ($_POST['f_pseudo']) && !empty($_POST['f_pseudo']) && isset ($_POST['f_pass']) && !empty($_POST['f_pass'])) {

    // Hachage du mot de passe
    $pass_hache = password_hash($_POST["f_pass"], PASSWORD_BCRYPT);

    //Verif si membre existe
    $user_req = $bdd->prepare('SELECT * FROM membres WHERE pseudo = ?');
    $user_req->execute(array($_POST['f_pseudo']));


    if ($user_req->fetch()) {


        $user_req = $bdd->prepare('SELECT * FROM membres WHERE (pseudo = ?, pass = ?)');
        $user_req->execute(array($_POST['f_pseudo']), $_POST['f_pass']));


        } else {
        $error = "L'utilisateur n'existe pas!";
    }

}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TP Espace membre - Connexion</title>
</head>
<body>
<form method="POST">

    <div class="formulaire">
        <div class="child">
            <p>
            <h1>Se connecter</h1>
            </p>
        </div>
        <div class="child">
            <div class="champ">
                <p>
                    <label for=f_pseudo"> Pseudo : </label>
                    <input id="f_pseudo" type="text" name="f_pseudo">
                </p>
                <p>
                    <label for="f_pass"> Mot de passe : </label>
                    <input id="f_pass" type="password" name="f_pass">
                </p>
            </div>
        </div>
        <div class="child">
            <p>
                <input type="submit"/>
            </p>
        </div>
        <div class="child">
            <p>
                <a href="inscription.php">Pas encore membre ? cliquez ici pour créer votre compte !</a>
            </p>
        </div>
        <div class="child">
            <div id="message">
                <p>
                    <?= isset($error) ? $error : ""; ?>
                </p>
            </div>
        </div>
</form>
</body>
</html>