<?php

namespace Blog\Modele;

use Blog\Framework\Modele;

/**
 * Modélise un utilisateur du blog
 *
 * @author Baptiste Pesquet
 */
class Utilisateur extends Modele
{
    /**
     * Vérifie qu'un utilisateur existe dans la BD
     *
     * @param string $login Le login
     * @param string $mdp Le mot de passe
     * @return boolean Vrai si l'utilisateur existe, faux sinon
     */
    public function connecter($login, $mdp)
    {
        $sql = "SELECT UTIL_ID , UTIL_MDP FROM T_UTILISATEUR WHERE UTIL_LOGIN=?";
        $utilisateur = $this->executerRequete($sql, array($login));

        if ($utilisateur->rowCount() == 1) {
            $utilisateur = $utilisateur->fetch();
            if (password_verify($mdp, $utilisateur["UTIL_MDP"])) {
                return true;
            } else {
                return false;
            }


        } else {
            return false;
        };
    }

    /*
    //Inscription
    public function changerPass($login, $mdp, $verif_mdp)
    {
        if ($mdp == $verif_mdp) {

            // Hachage du mot de passe
            $pass_hache = password_hash($mdp, PASSWORD_BCRYPT);

            //Verif si membre existe
            $login = $sql = "SELECT * FROM T_UTILISATEUR WHERE UTIL_LOGIN = ?";
            $login = $this->executerRequete($sql, array($login));

            if (!$login->fetch()) {

                //Insertion
                $req = $sql = "UPDATE INTO T_UTILISATEUR(login, mdp) VALUES(:login, :mdp)";
                $req->execute(array(
                    'login' => $_POST['login'],
                    'mdp' => $pass_hache));
            } else {
                $this->genererVue(array('msgErreur' =>
                    'Nouvelle utilisateur crées'), "index");

                //Insertion
                $req = $sql = "INSERT INTO T_UTILISATEUR(login, mdp) WHERE login = ?, mdp = ?";
                $req = $this->executerRequete($sql, array(
                    'login' => $login,
                    'mdp' => $pass_hache));
            };

        else {
                $this->genererVue(array('msgErreur' =>
                    'Les mots de passes ne sont pas identiques'), "index");

            };

        }

*/
    /**
     * Renvoie un utilisateur existant dans la BD
     *
     * @param string $login Le login
     * @param string $mdp Le mot de passe
     * @return mixed L'utilisateur
     * @throws \Exception Si aucun utilisateur ne correspond aux paramètres
     */
    public
    function getUtilisateur($login, $mdp)
    {
        $sql = "SELECT UTIL_ID AS idUtilisateur, UTIL_LOGIN AS login, UTIL_MDP AS mdp
FROM T_UTILISATEUR WHERE UTIL_LOGIN=?";
        $utilisateur = $this->executerRequete($sql, array($login));
        if ($utilisateur->rowCount() == 1)
            return $utilisateur->fetch(); // Accès à la première ligne de résultat
        else
            throw new \Exception("Aucun utilisateur ne correspond aux identifiants
fournis");
    }


    /**
     * Modification d'un utilisateur existant - pierre
     */
    public function modificationPassword()
    {
        // Si login et mdp et verif mdp existe alors ...
        if ($this->requete->existeParametre("mdp") && $this->requete->existeParametre("verif_mdp")) {

            //Recuperation des login mdp et verif_mdp
            $mdp = $this->requete->getParametre("mdp");
            $verif_mdp = $this->requete->getParametre("verif_mdp");

            // Si les 2 mots de passe sont identiques
            if ($mdp == $verif_mdp) {

                // Hachage du mot de passe
                $pass_hache = password_hash($mdp, PASSWORD_BCRYPT);

                //Insertion
                $sql = 'UPDATE INTO T_UTILISATEUR(login, mdp) VALUES(:login, :mdp)';
                $this->executeRequete(array(
                    'mdp' => $pass_hache));
            } else {
                $this->genererVue(array('msgErreur' =>
                    'Les mots de passes ne sont pas identiques'), "index");

            };

        };
    }

    /**
     * Création d'un utilisateur existant - pierre
     *
    public function creationUtilisateur()
    {
        // Si login et mdp et verif mdp existe alors ...
        if ($this->requete->existeParametre("login") &&
            $this->requete->existeParametre("mdp") && $this->requete->existeParametre("verif_mdp")
        $this->requete->existeParametre("email") && this->requete->existeParametre("dateNaissance")) {

        //Recuperation des login mdp et verif_mdp
        $login = $this->requete->getParametre("login");
        $mdp = $this->requete->getParametre("mdp");
        $verif_mdp = $this->requete->getParametre("verif_mdp");

        // Si les 2 mots de passe sont identiques
        if ($mdp == $verif_mdp) {

            // Hachage du mot de passe
            $pass_hache = password_hash($mdp, PASSWORD_BCRYPT);

            //Insertion
            $sql = 'INSERT INTO T_UTILISATEUR(login, mdp,email,dateNaissance) VALUES(:login, :mdp, :email, dateNaissance)';
            $this->executeRequete(array(
                'login' => $_POST['login'],
                'mdp' => $pass_hache,
                'email' => $_POST['email'],
                'dateNaissance' => $_POST['dateNaissance']));
        } else {
            $this->genererVue(array('msgErreur' =>
                'Les mots de passes ne sont pas identiques'), "index");

        };

    };
    }*/


}