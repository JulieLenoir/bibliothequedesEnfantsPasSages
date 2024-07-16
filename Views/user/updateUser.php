<?php


$title = 'Modification Profil- Bibliotheque';
?>


<div>
    <h5>Modification du profil de <?php echo $affichageFiche->prenom_user ?> <?php echo $affichageFiche->nom_user ?>
    </h5>
    <form action="index.php?controller=user&action=traitementUpdateUser&id_user=<?php echo $affichageFiche->id_user ?>" method="post" class="card" style="width: 18rem;">
        <div class="col-md-6">
            <label for="nom_user" class="form-label">Nom</label>
            <input type="text" name="nom_user" class="form-control" value="<?php echo $affichageFiche->nom_user ?>">
        </div>
        <div class="col-md-6">
            <label for="prenom_user" class="form-label">Prénom</label>
            <input type="text" name="prenom_user" class="form-control" value="<?php echo $affichageFiche->prenom_user ?>">
        </div>

        <div class="col-12">
            <label for="email_user" class="form-label">Email</label>
            <input type="email" name="email_user" class="form-control" value="<?php echo $affichageFiche->email_user ?>">
        </div>
        <input type="submit" name="modifier" class="form-control" value="Modifier">
    </form>
</div>