<?php
$bdd = new PDO ('mysql:host=localhost;dbname=tp_espace_membres;charset=utf8', 'root', "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

// Vérification
if (isset ($_POST['f_pseudo']) && !empty($_POST['f_pseudo']) && isset ($_POST['f_pass']) && !empty($_POST['f_pass']) && isset ($_POST['f_email']) && !empty($_POST['f_email']) && isset ($_POST['f_verif_pass']) && !empty($_POST['f_verif_pass'])) {
    if ($_POST['f_pass'] == $_POST['f_verif_pass']) {
        // Hachage du mot de passe
        $pass_hache = password_hash($_POST["f_pass"], PASSWORD_BCRYPT);

        //Verif si membre existe
        $user_req = $bdd->prepare('SELECT * FROM membres WHERE pseudo = ?');
        $user_req->execute(array($_POST['f_pseudo']));

        if (!$user_req->fetch()) {

            //Vérication regex si email contient un "@" $1 et un "." $2 et que les trois derniers caractéres sont alphanumérique $3, et i pour ignorer la casse
            if (preg_match("#.+(@).+(\.+)\w{2,4}$#", $_POST["f_email"])) {


                //Insertion
                $req = $bdd->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES(:pseudo, :pass, :email, CURDATE())');
                $req->execute(array(
                    'pseudo' => $_POST['f_pseudo'],
                    'pass' => $pass_hache,
                    'email' => $_POST['f_email']));
                $message = "Ce compte a bien été crée. <br /><a href=\"index.php\">Cliquez ici pour vous identifier !</a>";

            } else {
                $error = "L'email n'a pas un format valide !";;
            }
        } else {
            $error = "L'utilisateur existe déja !";
        }
    } else {
        $error = "Les mots de passes ne sont pas identiques";
    }
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/style.css"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TP Espace membre - Inscription</title>
</head>
<body>

<form method="POST">

    <div class="formulaire">
        <div class="child">
            <p>
            <h1>Formulaire d'inscription</h1>
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
                <p>
                    <label for="f_verif_pass"> Retapez votre mot de passe : </label>
                    <input id="f_verif_pass" type="password" name="f_verif_pass">
                </p>
                <p>
                    <label for="f_email"> Adresse email : </label>
                    <input id="f_email" type="text" name="f_email">
                </p>
            </div>
        </div>
        <div class="child">
            <p>
                <input type="submit"/>
            </p>
        </div>
        <div class="child">
            <div id="erreur">
                <p>
                    <?= isset($error) ? $error : ""; ?>
                </p>
            </div>
            <div id="message">
                <p>
                    <?= isset($message) ? $message : ""; ?>
                </p>
            </div>
</form>
<script src="js/clignotant.js"></script>
</body>
</html>