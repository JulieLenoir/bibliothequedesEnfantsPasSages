<?php


$title = 'Detail du Profil- Bibliotheque';
?>

<h1>Profil de <?php echo $listUser->prenom_user ?> <?php echo $listUser->nom_user ?></h1>

<section class="row">



    <div class="card col-sm-12 text-center col-lg-3" style="width: 15rem; margin: 0 auto; padding-top: 0.5em; margin-bottom: 2em; margin-top: 2em;">

        <div class="card-body">
            <h5 class="card-title"><?php echo $listUser->nom_user ?> <?php echo $listUser->prenom_user ?></h5>
            <p class="card-text"><?php echo $listUser->email_user ?></p>
        </div>

        <div class="card-body">
            <a href="index.php?controller=user&action=deleteUser&id_user=<?php echo $listUser->id_user ?>" class="card-link">Supprimer l'utilisateur</a>
        </div>
        <div class="card-body">
            <a href="index.php?controller=user&action=tableauDeBordUser">Retour à la liste des utilisateurs</a>
        </div>
    </div>

    <h3>Détail des emprunts en cours</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titre du Livre</th>
                <th scope="col">Date de l'emprunt</th>
                <th scope="col">Retour de l'emprunt</th>

            </tr>
            <?php
            foreach ($listeLivreEmprunte as $value) {
                // var_dump($listUser);
                // die;
            ?>
                <tr>
                    <td><?php echo $value->id_livre ?> </td>
                    <td><?php echo $value->titre_livre ?> </td>
                    <td><?php echo $value->date_emprunt ?> </td>
                    <td><a href="index.php?controller=emprunt&action=deleteEmprunt&id_livre=<?php echo $value->id_livre ?>&id_user= <?php echo $listUser->id_user ?>"><i class="bi bi-bootstrap-reboot"></i></a> </td>








                </tr>

            <?php
            } ?>
    </table>
    <a href="index.php?controller=emprunt&action=empruntLivre&id_user=<?php echo $listUser->id_user ?>" class="card-link">Voir la liste des livres</a>