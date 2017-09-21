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
        $login = $this->requete->getSession()->getAttribut("login");
        $this->genererVue(array('nbBillets' => $nbBillets,
            'nbCommentaires' => $nbCommentaires, 'nbSignalements' => $nbSignalements, 'login' => $login));
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
                $this->utilisateur->inscription( $pseudo, $mdp, $nom, $prenom, $dateNaissance, $email);
                $this->rediriger("admin");
            } else {
                $param['msgErreur'] = 'Mot de passe non identique';
            }
        }
        $this->genererVue($param);
    }

}