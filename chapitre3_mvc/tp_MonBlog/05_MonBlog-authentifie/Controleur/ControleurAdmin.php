<?php

namespace Blog\Controleur;

use Blog\Modele\Billet;
use Blog\Modele\Commentaire;
use Blog\Modele\Utilisateur;


/**
 * Contrôleur des actions d'administration
 *
 * @author Baptiste Pesquet
 */
class ControleurAdmin extends ControleurSecurise
{
    private $billet;
    private $commentaire;
    private $utilisateur;

    /**
     * Constructeur
     */
    public function __construct()
    {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
        $this->utilisateur = new Utilisateur();

    }

    public function index()
    {
        $nbBillets = $this->billet->getNombreBillets();
        $nbCommentaires = $this->commentaire->getNombreCommentaires();
        $nbSignalements = $this->commentaire->getNombreSignalements();
        //Ajout
        $billets = $this->billet->getBilletsTronques();

        //Fin de l'ajout
        $login = $this->requete->getSession()->getAttribut("login");
        $this->genererVue(array('nbBillets' => $nbBillets,
            'nbCommentaires' => $nbCommentaires, 'nbSignalements' => $nbSignalements, 'billets' => $billets, 'login' => $login));
    }

    public function modifierMdp()
    {
        $param = array();

        if ($this->requete->existeParametre("mdp") &&
            $this->requete->existeParametre("verif_mdp")) {
            $mdp = $this->requete->getParametre('mdp');
            $verifMdp = $this->requete->getParametre('verif_mdp');
            if ($mdp === $verifMdp) {
                $id = $this->requete->getSession()->getAttribut("idUtilisateur");
                $this->utilisateur->modificationPassword($id, $mdp);
                $this->rediriger("admin");
            } else {
                $param['msgErreur'] = 'Mot de passe non identique';
            }

        }

        $this->genererVue($param);
    }

    public function inscription()
    {
        $param = array();
        if ($this->requete->existeParametre("pseudo") && $this->requete->existeParametre("nom") && $this->requete->existeParametre("prenom")
            && $this->requete->existeParametre("dateNaissance") && $this->requete->existeParametre("email") && $this->requete->existeParametre("mdp")
            && $this->requete->existeParametre("verif_mdp")) {
            $mdp = $this->requete->getParametre('mdp');
            $verifMdp = $this->requete->getParametre('verif_mdp');
            $pseudo = $this->requete->getParametre('pseudo');
            $nom = $this->requete->getParametre('nom');
            $prenom = $this->requete->getParametre('prenom');
            $dateNaissance = $this->requete->getParametre('dateNaissance');
            $email = $this->requete->getParametre('email');

            if ($mdp === $verifMdp) {
                $this->utilisateur->inscription($pseudo, $mdp, $nom, $prenom, $dateNaissance, $email);
                $this->rediriger("admin");
            } else {
                $param['msgErreur'] = 'Mot de passe non identique';
            }
        }
        $this->genererVue($param);
    }

    public function creationBillet()
    {
        if ($this->requete->existeParametre("dateBillet") && $this->requete->existeParametre("titreBillet") && $this->requete->existeParametre("contenuBillet")) {
            $dateBillet = $this->requete->getParametre('dateBillet');
            $titreBillet = $this->requete->getParametre('titreBillet');
            $contenuBillet = $this->requete->getParametre('contenuBillet');
            $this->billet->creationBillet($dateBillet, $titreBillet, $contenuBillet);
            $this->rediriger("admin");
        }
        $this->genererVue();
    }

    public function compterChecbox () {
        if(!empty($_POST['check_list'])) {
            foreach($_POST['check_list'] as $check) {
                echo $check; //echoes the value set in the HTML form for each checked checkbox.
                //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
                //in your case, it would echo whatever $row['Report ID'] is equivalent to.
            }
        }
    }


    public function supprimerBillet()
    {
        $this->compterChecbox();
        if ($this->requete->existeParametre("idBillet")) {
            $idBillet = $this->requete->getParametre("idBillet");
            $this->billet->supprimerBillet($idBillet);
            $this->rediriger("admin");
        }

            $param['msgErreur'] = 'ca marche pas';
        var_dump($param);
        var_dump($idBillet);
    }

}