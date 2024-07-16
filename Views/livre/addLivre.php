<?php
$title = 'Ajout Livre | Bibliotheque';
?>
<div class='m-5'>

    <h4>Remplissez ce formulaire pour ajouter un livre </h4>
</div>

<form class="row g-3 m-5" method="POST" action="index.php?controller=livre&action=traitementAddLivre">
    <div class="col-md-6">
        <label for="titre_livre" class="form-label">Titre</label>
        <input type="text" class="form-control" name="titre_livre">
    </div>
    <div class="col-md-6">
        <label for="auteur_livre" class="form-label">Auteur</label>
        <input type="text" class="form-control" name="auteur_livre">
    </div>
    <div class="col-12">
        <label for="edition_livre" class="form-label">Edition</label>
        <input type="text" class="form-control" name="edition_livre">
    </div>


    <button type="submit" name="valider" class="btn btn-info col-5 m-auto">Ajouter ce Livre à la collection</button>

</form>