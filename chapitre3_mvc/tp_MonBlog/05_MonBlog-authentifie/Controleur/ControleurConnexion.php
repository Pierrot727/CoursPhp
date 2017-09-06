<?php
require_once 'Framework/Controleur.php';
require_once 'Modele/Utilisateur.php';

class ControleurConnexion extends Controleur
{
    private $utilisateur;

    public function __construct()
    {
        $this->utilisateur = new Utilisateur();
    }

    public function index()
    {
        $this->genererVue();
    }

    public function connecter()
    {
        if ($this->requete->existeParametre("login") &&
            $this->requete->existeParametre("mdp")) {
            $login = $this->requete->getParametre("login");
            $mdp = $this->requete->getParametre("mdp");
            if ($this->utilisateur->connecter($login, $mdp)) {
                $utilisateur = $this->utilisateur->getUtilisateur($login, $mdp);
                $this->requete->getSession()->setAttribut("idUtilisateur",
                    $utilisateur['idUtilisateur']);
                $this->requete->getSession()->setAttribut("login",
                    $utilisateur['login']);
                $this->rediriger("admin");
            } else
                $this->genererVue(array('msgErreur' =>
                    'Login ou mot de passe incorrects'), "index");
        } else
            throw new Exception(
                "Action impossible : login ou mot de passe non défini");
    }

    public function deconnecter()
    {
        $this->requete->getSession()->detruire();
        $this->rediriger("accueil");
    }


    /**
     * Modification d'un utilisateur existant ou création d'un nouveau - pierre
     */
    public function modification()
    {
        // Si login et mdp et verif mdp existe alors ...
        if ($this->requete->existeParametre("login") &&
            $this->requete->existeParametre("mdp") && $this->requete->existeParametre("verif_mdp")) {

            //Recuperation des login mdp et verif_mdp
            $login = $this->requete->getParametre("login");
            $mdp = $this->requete->getParametre("mdp");
            $verif_mdp = $this->requete->getParametre("verif_mdp");

            // Si les 2 mots de passe sont identiques
            if ($mdp == $verif_mdp) {

                // Hachage du mot de passe
                $pass_hache = password_hash($mdp, PASSWORD_BCRYPT);

                //Verif si membre existe
                $login = $sql = 'SELECT * FROM T_UTILISATEUR WHERE UTIL_LOGIN = ?';
                $login = $this->executerRequete($sql, array($login));

                //Si le login existe déja, mise à jour
                if (!$login->fetch()) {

                    //Insertion
                    $requ = $sql = 'UPDATE INTO T_UTILISATEUR(login, mdp) VALUES(:login, :mdp)';
                    $requ->execute(array(
                        'login' => $_POST['login'],
                        'mdp' => $pass_hache));
                } else //Si le login n'exite pas, création d'un nouvellle utilisateur
                {
                    $this->genererVue(array('msgErreur' =>
                        'Nouvelle utilisateur crées'), "index");

                    //Insertion
                    $reqi = $sql = 'INSERT INTO T_UTILISATEUR(login, mdp) VALUES(:login, :mdp)';
                    $reqi->execute(array(
                        'login' => $_POST['login'],
                        'mdp' => $pass_hache));
                };
            } else {
                $this->genererVue(array('msgErreur' =>
                    'Les mots de passes ne sont pas identiques'), "index");

            };

        };

    }
}