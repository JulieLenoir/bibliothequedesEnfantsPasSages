<?php



$title = "fiche livre - Bibliotheque";
?>

<h1><?php echo $listLivre->titre_livre ?>

</h1>


<section class="row">



    <div class="card col-sm-12 text-center col-lg-3" style="width: 15rem; margin: 0 auto; padding-top: 0.5em; margin-bottom: 2em; margin-top: 2em;">

        <div class="card-body">
            <h5 class="card-title"><?php echo $listLivre->titre_livre ?></h5>
            <p class="card-text"><?php echo $listLivre->auteur_livre ?></p>
            <p class="card-text"><?php echo $listLivre->edition_livre ?></p>
        </div>

        <div class="card-body">
            <a href="index.php?controller=livre&action=deleteLivre&id_livre=<?php echo $listLivre->id_livre ?>" class="card-link">Supprimer le livre des collections</a>

        </div>

    </div>
    <div class="card-body">
        <a href="index.php?controller=livre&action=index">Retour à la liste des livres</a>
    </div>