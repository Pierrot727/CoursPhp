<?php
//Autochargement des classes
function chargerClasse($classe)
{
    require $classe . '.php'; // Inclusion des classes necessaire
}

spl_autoload_register('chargerClasse'); // Antochargement des classes

//Info :  classe du projet
// PersonnageManager.php -> Gestion de la base de donnée

// Puis, seulement après, je me sers de ma classe.
//Accés à la base de donnée

//Création de la class (objet) Personnage


$perso = new Personnage("toto");

if (isset($_POST['form_nom']) && isset($_POST['form_power'])) {
    $perso->setNom($_POST['form_nom']);
    $perso->setPower($_POST['form_power']);
    $persoManager = new PersonnageManager();
    $persoManager->add($perso);
}

var_dump($perso);
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
                        <input id="form_nom" type="text" name="form_nom"/>
                    </p>
                    <p>
                        <label for="form_power"> Force du personnage : </label>
                        <input id="form_power" name="form_power"/>
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
        </div>
    </div>
</form>
</body>
</html>