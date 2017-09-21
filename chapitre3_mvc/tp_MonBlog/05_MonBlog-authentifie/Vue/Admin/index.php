<?php $this->titre = "Mon Blog - Administration" ?>
<h2>Administration</h2>
Bienvenue, <?= $this->nettoyer($login) ?> ! </br>
Ce blog comporte <?= $this->nettoyer($nbBillets) ?> billet(s) et
<?= $this->nettoyer($nbCommentaires) ?> commentaire(s) et <?= $this->nettoyer($nbSignalements) ?> signalements </br>
</br>
Gestion :
<a id="lienPass" href="admin/modifierMdp">Changer le mot de passe</a>
<a id="lienIns" href="inscription">Ajouter un nouvel utilisateur</a>
<a id="lienDeco" href="connexion/deconnecter">Se déconnecter</a>