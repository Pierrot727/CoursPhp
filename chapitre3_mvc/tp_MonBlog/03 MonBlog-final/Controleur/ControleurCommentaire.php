<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';
/**
 * Contrôleur des actions liées aux billets
 *
 * @author Baptiste Pesquet
 */
class ControleurCommentaire extends Controleur {


    private $commentaire;

    /**
     * Constructeur 
     */
    public function __construct() {
        $this->commentaire = new Commentaire();
    }

    // Affiche les détails sur un billet
    public function index() {
    }

    // Signalement
    public function signaler() {
        $idCommentaire = $this->requete->getParametre("id");
        $com = $this->commentaire->get
        $this->commentaire->ajouterUnSignalement($idCommentaire);

        header("Location: /coursPhp/chapitre3_mvc/tp_MonBlog/MonBlog-final/billet/index/$com[bil_id]");
    }
}

