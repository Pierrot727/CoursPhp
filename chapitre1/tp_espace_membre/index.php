<?php
//Création de la session
session_start();
$user_connected = false;

//Vérification si une session est crée
if (isset($_SESSION['session_pseudo'])) {
    $error = "Bienvenue " . $_SESSION['session_pseudo'];
    $user_connected = true;
} else {


    $bdd = new PDO ('mysql:host=localhost;dbname=tp_espace_membres;charset=utf8', 'root', "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

// Vérification de l'accés
    if (isset ($_POST['f_pseudo']) && !empty($_POST['f_pseudo']) && isset ($_POST['f_pass']) && !empty($_POST['f_pass'])) {

        //Verifie si le membre existe
        $user_req = $bdd->prepare('SELECT pseudo, pass FROM membres WHERE pseudo = ?');
        $user_req->execute(array($_POST['f_pseudo']));

        if ($donnees = $user_req->fetch()) {

            //Vérifie le mot de passe
            if (password_verify($_POST['f_pass'], $donnees['pass'])) {

                $error = "bienvenue sur votre compte";
                $_SESSION['session_pseudo'] = $donnees['pseudo'];
                $user_connected = true;

            } else {
                $error = "Le mot de passe est incorrect !";
            }

        } else {
            $error = "L'utilisateur n'existe pas!";
        }

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
    <title>TP Espace membre - Connexion</title>
</head>
<body>
<!-- Si l'utilisateur est connecté, il lui propose de se déconnecter-->
<?php if ($user_connected): ?>


    <!-- page membre *************************************************************************************************** -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>western shop - free website template</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="templatemo_style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
    <div id="templatemo_banner_wrapper">
        <div id="templatemo_banner">
            <div id="templatemo_menu">
                <ul>
                    <li><a href="#" class="current">Home</a></li>
                    <li><a href="deconnexion?php" title="Se deconnecter"> Se déconnecter </a></li>
                </ul>
            </div>

        </div> 	<!-- end of banner -->
    </div> <!-- end of banner wrapper -->

    <div id="templatemo_content_wrapper">
        <div id="templatemo_content">

            <div id="main_column">
                <div class="content_top"></div>

                <div class="section_w480">
                    <h2>Welcome to Western Shop</h2>

                    <img class="image_wrapper fr_image" src="images/templatemo_image_01.jpg" alt="image" />
                    <p>This <a href="#">CSS template</a> is provided by TemplateMo for free of charge. Feel free to download, edit and apply this template for your websites. Credit goes to <a href="http://www.photovaco.com" target="_parent">Free Photos</a> for photos.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et quam vitae ipsum vulputate varius vitae semper nunc. Quisque eget elit quis augue pharetra feugiat. Suspendisse turpis arcu, dignissim ac laoreet a, condimentum in massa. Sed condimentum lectus sed justo laoreet eget malesuada lectus luctus.</p>

                </div>

                <div class="cleaner_h30"></div>

                <div class="section_w480">
                    <h2>Our Featured Work</h2>

                    <h4><a href="#">Web Design Project</a></h4>
                    <img class="image_wrapper fl_image" src="images/templatemo_image_03.jpg" alt="image" />

                    <p>Etiam et metus quam. Maecenas egestas ipsum tempus mauris sodales non convallis arcu dictum. Duis vitae felis nec purus placerat mollis vel non lacus. Sed vehicula massa egestas lorem tincidunt gravida ut eu neque. Suspendisse ac mi urna, at sodales odio. Ut fermentum tristique metus, in hendrerit risus scelerisque et. <a href="#">Read more...</a></p>

                    <div class="cleaner_h20"></div>

                    <h4><a href="#">Free CSS  Template</a></h4>
                    <img class="image_wrapper fl_image" src="images/templatemo_image_02.jpg" alt="image" />

                    <p>Suspendisse ultricies purus pulvinar lorem adipiscing et elementum metus pellentesque. Integer turpis dolor, pharetra et semper vel, tempor vitae massa. Vestibulum ac nunc urna, ut posuere nisi. Quisque et fermentum magna. Nunc eget arcu eros, et molestie enim. Donec posuere risus tincidunt erat tempor mattis. <a href="#">Read more...</a></p>
                </div>


                <div class="cleaner"></div>
                <div class="content_bottom"></div>
            </div> <!-- end of main column -->

            <div id="side_column">

                <div class="section_w350">
                    <div class="news_box">

                        <h3>News</h3>

                        <h4><a href="#">Etiam et metus quam</a></h4>
                        <p>Quisque et fermentum magna. Maecenas egestas ipsum tempus mauris sodales non convallis arcu dictum.</p>

                        <div class="cleaner_h10"></div>

                        <h4><a href="#">Duis vitae felis nec purus</a></h4>
                        <p>Pellentesque a pellentesque urna. Ut fermentum tristique metus, in hendrerit risus scelerisque.</p>

                    </div>
                </div>

            </div> <!-- end of side column -->

            <div id="templatemo_footer">

                Copyright © 2024 <a href="#">Your Company Name</a> <!-- Credit: www.templatemo.com -->

                <div class="cleaner_h20"></div>

                <a href="http://validator.w3.org/check?uri=referer"><img style="border:0;width:88px;height:31px" src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" width="88" height="31" vspace="8" border="0" /></a>
                <a href="http://jigsaw.w3.org/css-validator/check/referer"><img style="border:0;width:88px;height:31px"  src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="Valid CSS!" vspace="8" border="0" /></a>

            </div> <!-- end of footer -->
            <div class="cleaner"></div>

        </div> <!-- end of content -->
    </div> <!-- end of content wrapper -->

    <!-- Fin de page membre ******************************************************************************************** -->

    </body>



<?php else: ?>

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
                <div id="erreur">
                    <p>
                        <?= isset($error) ? $error : ""; ?>
                    </p>
                </div>
            </div>
    </form>
    <script src="js/clignotant.js"></script>
<?php endif; ?>
</body>
</html>
