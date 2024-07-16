<?php


$title = 'Gestion Emprunt - Bibliotheque';
?>

<h1 style="margin-bottom: 2em;"> Biblioth&egrave;que des Enfants pas Sages - Administration</h1>
<div class=" d-flex justify-content-evenly">
    <div class="card" style="width: 18rem;">
        <img src="images/user-interface.png" class="card-img-top" alt="Gestion des utilisateurs">
        <div class="card-body" style="text-align:center;">


            <a href="index.php?controller=user&action=tableauDeBordUser" class="btn btn-primary">Gestion des Utilisateurs et <br>des Emprunts</a>
        </div>

    </div>

    <div class="card" style="width: 18rem;">
        <img src="images/bibliotheque.png" class="card-img-top" alt="Gestion des Livres">
        <div class="card-body" style="text-align:center;">


            <a href="index.php?controller=livre&action=index" class="btn btn-primary">Gestion des Collections</a>
        </div>
    </div>
</div>