<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <base href="<?= $racineWeb ?>" >
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <link rel="stylesheet" href="Contenu/css/style.css" />
        <script src='Contenu/js/tinymce/tinymce.min.js'></script>
        <script>
            tinymce.init({
                selector: '#tiny',
                language: 'fr_FR'
            });
        </script>
        <title><?= $titre ?></title>
    </head>
    <body>
        <div id="global">
            <header>
                <a href=""><h1 id="titreBlog">Mon Blog</h1></a>
                <p>Je vous souhaite la bienvenue sur ce modeste blog.</p>
            </header>
            <div id="contenu">
                <?= $contenu ?>
            </div> <!-- #contenu -->
            <footer id="piedBlog">
                Blog réalisé avec PHP, HTML5 et CSS.  <?= $lien ?>
            </footer>
        </div> <!-- #global -->
    </body>
</html>