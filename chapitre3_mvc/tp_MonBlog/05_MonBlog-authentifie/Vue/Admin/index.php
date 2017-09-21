<?php $this->titre = "Mon Blog - Administration" ?>
<h2>Administration</h2>
Bienvenue, <?= $this->nettoyer($login) ?> ! </br>
Ce blog comporte <?= $this->nettoyer($nbBillets) ?> billet(s) et
<?= $this->nettoyer($nbCommentaires) ?> commentaire(s) et <?= $this->nettoyer($nbSignalements) ?> signalements </br>
<hr>
<table>
    <tr>
        <th>Selection</th>
        <th>Titre</th>
        <th>Date</th>
        <th>Billet commençant par</th>
        <th>Commentaires</th>
        <th>Signalement</th>
     </tr>

<?php foreach ($billets as $billet):
    ?>
    <tr>
        <th><input id="checkBox" type="checkbox"></th>
        <th><a href="<?= "billet/index/" . $this->nettoyer($billet['id']) ?>"><?= $this->nettoyer($billet['titre']) ?></a></th>
        <th><time><?= $this->nettoyer($billet['date']) ?></time></th>
        <th><?= $this->nettoyer($billet['contenu']) ?></th>
        <th>Oui (4)</th>
        <th>-</th>
    </tr>

<?php endforeach; ?>
</table>


<hr>
<a id="lienNbillet" href="admin/creationBillet"><img src="Contenu/images/symbol/nouveau.png" alt="Nouveau billet" title="Nouveau billet"></a>
<a id="lienModifBillet" href="admin/modifierBillet"><img src="Contenu/images/symbol/modifier.png" alt="modifier billet" title="Cliquez pour modifier le billet selectionné"></a>
<a id="lienSupprimerBillet" href="admin/supprimerBillet"><img src="Contenu/images/symbol/supprimer.png" alt="supprimer billet" title="Cliquez pour supprimer le/les billet(s) selectionné(s)"></a>

<hr>
Gestion :
<a id="lienPass" href="admin/modifierMdp">Changer le mot de passe</a> -
<a id="lienIns" href="admin/inscription">Ajouter un nouvel utilisateur</a> -
<a id="lienDeco" href="connexion/deconnecter">Se déconnecter</a>