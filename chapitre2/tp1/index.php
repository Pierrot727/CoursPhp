<?php
//Autochargement des classes
function chargerClasse($classe)
{
    require $classe . '.php'; // Inclusion des classes necessaire
}

spl_autoload_register('chargerClasse'); // Antochargement des classes

//Info :  classe du projet
// class_bddManager.php -> Gestion de la base de donnée

$objet = new MaClasse; // Puis, seulement après, je me sers de ma classe.
//Accés à la base de donnée

//Création de la class (objet) Personnage
class Personnage
{
    // attributs
    private $_nom;
    private $_force;

    //methode
    private function frapper()
    {

    }
}

$defaut = new Personnage;

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- Insertion feuille css -->
    <link rel="stylesheet" href="style.css"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TP Mini-jeux de combat</title>
</head>
<body>
<form method="POST">

    <div class="formulaire">
        <div class="child">
            <p>
            <h1>Mini-jeux de combat</h1>
            </p>
            <div class="child">
                <div class="champ">
                    <p>
                        <label for=form_nom"> Nom du personnage : </label>
                        <input id="form_nom"" type="text" name="form_pseudo">
                    </p>
                    <p>
                        <label for="form_forcePerso"> Force du personnage : </label>
                        <input id="form_forcePerso" name="form_forcePerso">
                    </p>
                </div>
            </div>
            <div class="child">
                <p>
                    <input type="submit"/>
                </p>
            </div>
            <div class="child">
                <div id="message">
                    <p>
                        <?= isset($merssage) ? $message : ""; ?>
                    </p>
                </div>
                <div id="erreur">
                    <p>
                        <?= isset($erreur) ? $erreur : ""; ?>
                    </p>
                </div>
            </div>
</form>
</body>
</html>