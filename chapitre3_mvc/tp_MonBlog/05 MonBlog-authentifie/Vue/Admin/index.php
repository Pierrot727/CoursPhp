<?php $this->titre = "Mon Blog - Administration" ?>
<h2>Administration</h2>
Bienvenue, <?= $this->nettoyer($login) ?> ! </br>
Ce blog comporte <?= $this->nettoyer($nbBillets) ?> billet(s) et
<?= $this->nettoyer($nbCommentaires) ?> commentaire(s) et <?= $this->nettoyer($nbSignalements) ?> signalements </br>
</br>
Gestion :
<a id="lienPass" href="modifier">Changer le mot de passe</a>
<a id="lienDeco" href="connexion/deconnecter">Se déconnecter</a>