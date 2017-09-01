<?php
require_once 'Framework/Modele.php';

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
        $sql = "SELECT UTIL_ID FROM T_UTILISATEUR WHERE UTIL_LOGIN=? AND UTIL_MDP=?";
        $utilisateur = $this->executerRequete($sql, array($login, $mdp));
        return ($utilisateur->rowCount() == 1);
    }

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


        /**
         * Renvoie un utilisateur existant dans la BD
         *
         * @param string $login Le login
         * @param string $mdp Le mot de passe
         * @return mixed L'utilisateur
         * @throws Exception Si aucun utilisateur ne correspond aux paramètres
         */
        public
        function getUtilisateur($login, $mdp)
        {
            $sql = "SELECT UTIL_ID AS idUtilisateur, UTIL_LOGIN AS login, UTIL_MDP AS mdp
FROM T_UTILISATEUR WHERE UTIL_LOGIN=? AND UTIL_MDP=?";
            $utilisateur = $this->executerRequete($sql, array($login, $mdp));
            if ($utilisateur->rowCount() == 1)
                return $utilisateur->fetch(); // Accès à la première ligne de résultat
            else
                throw new Exception("Aucun utilisateur ne correspond aux identifiants
fournis");
        }
    }