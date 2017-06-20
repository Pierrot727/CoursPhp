<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mini-chat</title>
</head>
<body>
<form action="chat.php" method="GET">
    <p>
        <label> Entrez votre pseudo
            <input type="text" name="f_pseudo">
        </label>
    </p>
    <p>
        <label> Entrez votre message
            <input type="text" name="f_message">
        </label>
    </p>
    <p>
        <input type="submit"/>
    </p>
</form>
</body>
</html>



<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mini-chat</title>
</head>
<body>

<form action="chat.php" method="GET">
    <p>
        <label> Entrez votre pseudo
            <input type="text" name="f_pseudo">
        </label>
    </p>
    <p>
        <label> Entrez votre message
            <input type="text" name="f_message">
        </label>
    </p>
    <p>
        <input type="submit"/>
    </p>
</form>

</body>
</html>
<?php
$bdd = new PDO ('mysql:host=localhost;dbname=test;charset=utf8', 'root', "", array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$chat = $bdd->query('SELECT id,pseudo, message FROM mini_chat ORDER BY ID DESC LIMIT 5 ');

while ($donnees = $chat->fetch()) {
    echo '<p>' . $donnees['id'] . $donnees ['pseudo'] . ' a dit ' . $donnees ['message'] . '<p/>';
}

?>