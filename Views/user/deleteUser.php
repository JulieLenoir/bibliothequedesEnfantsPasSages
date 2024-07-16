<?php
$title = 'Suppression Utilisateur - Bibliotheque';
// var_dump($affichageUser);
// die;
?>
<h1 style="margin-top: 0.8em; margin-bottom: 2em;">Suppression d'un utilisateur</h1>
<p>Etes-vous sûr de vouloir supprimer le compte de <strong>
        <?php echo $affichageUser->prenom_user ?> <?php echo $affichageUser->nom_user ?> ?</strong></p>
<a href="index.php?controller=user&action=traitementDelete&id_user=<?php echo $affichageUser->id_user ?>">
    <button style="margin-bottom: 2em;" type="submit" class="btn btn-danger">Supprimer</button>
</a>