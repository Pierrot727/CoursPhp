<?php
namespace Blog\Controleur;

use Blog\Modele\Billet;
use Blog\Modele\Commentaire;


/**
 * Contrôleur des actions d'administration
 *
 * @author Baptiste Pesquet
 */
class ControleurAdmin extends ControleurSecurise
{
    private $billet;
    private $commentaire;

    /**
     * Constructeur
     */
    public function __construct()
    {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();

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
}