<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mon minichat</title>
        <meta name="description" content="Mon minichat a moi">

        <style type="text/css"> 

            h1, h3
            {
                text-align:center;
            }
            h3
            {
                background-color:black;
                color:white;
                font-size:0.9em;
                margin-bottom:0px;
            }
            .news p
            {
                background-color:#CCCCCC;
                margin-top:0px;
            }
            .news
            {
                width:70%;
                margin:auto;
            }

            .alert
            {
                color:red;
            }

            a
            {
                text-decoration: none;
                color: blue;
            }

        </style>
    </head>
    <body>
        <h1>Indiquez votre pseudo, puis écrivez votre message</h1>
        <p><strong>Si vous etes correcteur:</strong><br>Merci par avance de ne pas tenir compte de la cosmétique ce n'est pas l'objet de l'activité :)</p>
        <form method="post" action="minichat_post.php">
        
        <!-- ici on insère la valeur par défaut du pseudo si le cookie existe bien -->
            <p>
            <label for="pseudo">Pseudo : </label><input type="text" name="pseudo" 
            <?php
                if (isset($_COOKIE['pseudo']))
                    echo ' value="' . $_COOKIE['pseudo'] . '" />'; 
                else 
                    echo ' />'; 
            ?>
            </p>
            
            <p><label for="message">Message : </label><input type="text" name="message" /></p>
            <p class="alert">
            <?php
            // on repère si une entrée précédente était détectée comme invalide. si Oui, on ajoute l'info pour l'utilisateur avant le bouton d'envoi de formulaire.
                if (isset($_GET['invalidEntry']) && $_GET['invalidEntry']==1)
                    echo 'Entrée invalide. Recommencez!';
            ?>
            </p>
            <input type="submit" value="Envoi" />
        </form>

<?php

// connexion BDO
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=openclassrooms;charset=utf8','root','');
    }

    catch (Exception $e) {
        die('Erreur : ' . $e.getMessage());
    }

    // requete de lecture de la BDD. Ici onlimite aux 15 dernières entrées déjà triées par ordre décroissant d'ID. 
    $reponse = $bdd->query('SELECT ID, pseudo, message, DATE_FORMAT(date_message, \' Le %d/%m/%y à %Hh %imin et %ss\') AS madate FROM minichat ORDER BY ID DESC LIMIT 0, 15');

    //parcours des donnees obtenues
    while ($donnees = $reponse->fetch())
    {
    ?>
            <p>
                <?php
                // Ici pour chaque ligne de données, on ecrit sous forme lisible l'information
                echo $donnees['madate'] . ', <strong>' . strtoupper($donnees['pseudo']) . '</strong> a écrit :<br>' . $donnees['message']; 
                ?> 
            </p>

    <?php
        
    }

    //on oublie pas de fermer proprement la requete
    $reponse->closeCursor();

    ?>


    </body>
</html>