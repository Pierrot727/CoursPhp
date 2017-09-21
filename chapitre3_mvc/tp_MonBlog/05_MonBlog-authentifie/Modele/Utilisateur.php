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
    public function modificationPassword($id, $mdp)
    {

        $pass_hache = password_hash($mdp, PASSWORD_BCRYPT);


        $sql = 'UPDATE T_UTILISATEUR SET UTIL_MDP= :mdp WHERE UTIL_ID = :id';

       return $this->executerRequete($sql,array(
            'id'=>$id,
            'mdp' => $pass_hache
        ))->rowCount() == 1;
    }




}