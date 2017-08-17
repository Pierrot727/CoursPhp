<?php

class Modele
{

    private $bdd = null;

    public function __construct($dsn,$user,$pass)
    {
        $this->bdd = new PDO ($dsn, $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    }


//Insertion dans la base à l'aide d'une requete préparée et test si existe
    public function insertMessage()
    {
        if (isset ($_POST['form_pseudo']) && isset ($_POST['form_message'])) {

            $req = $this->bdd->prepare('INSERT INTO mini_chat (pseudo, message,heure) VALUES(?, ?, now())');
            return $req->execute(array($_POST['form_pseudo'], $_POST['form_message']));
        }
    }

    public function recuperationMessage()
    {

        return $this->bdd->query('SELECT id,pseudo, message, heure FROM mini_chat ORDER BY ID DESC LIMIT 5 ')->fetchAll();

    }
}