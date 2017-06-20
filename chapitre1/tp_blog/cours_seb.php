<?php
$bdd = new PDO ('mysql:host=localhost;dbname=test;charset=utf8', 'root', "", array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$blog = $bdd->prepare('SELECT * FROM mon_super_blog ORDER BY ? LIMIT 5');
$blog->execute(array('date'));
//       <?php echo   équivalent à   <?=
?>
    <!doctype html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <!-- Insertion feuille css -->
        <link rel="stylesheet" href="style.css" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Mon super blog</title>
    </head>
    <body>
    <h1>Mon super blog</h1>
    <p>Derniers billets du blog:</p>

    <section class="corp">
        <?php while ($article = $blog->fetch()) : ?>
            <div class="entete"><?= $article['titre'] ?> le <i> <?= $article['date_post'] ?></i></div>
            <div class="messages"><?= $article['message'] ?>
                <div class="commentaire"> <a href="commentaires.php">Commentaire</a> </div></div>
        <?php endwhile; ?>
        <HR size=1>
        <div id="footer">Liste des billets</div>
    </section>
    </body>
    </html>



<?php


if():
    foreach():

        /////////


    endforeach;

    ///////

endif;

