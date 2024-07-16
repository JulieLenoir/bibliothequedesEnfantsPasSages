<?php
$title = 'Collection Livres | Bibliotheque'
?>

<h1>Gestion des Collections - Liste de Tous Les Livres</h1>

<a href="index.php?controller=livre&action=addLivre"><button type="button" class="btn btn-primary">Ajouter un livre</button></a>

<table class="table">

    <tr>
        <th scope="col">*</th>
        <th scope="col">Titre</th>
        <th scope="col">Auteur</th>
        <th scope="col">Edition</th>

        <th scope="col">Emprunté par</th>
        <th scope="col">Emprunté le</th>
        <th scope="col">Retour prévu le </th>
        <th scope="col">Voir la fiche du livre</th>


    </tr>



    <?php
    foreach ($listLivre as $value) {
        // var_dump($listUser);
        // die;
    ?>
        <tr>
            <td><?php echo $value->id_livre ?> </td>
            <td><?php echo $value->titre_livre ?> </td>
            <td><?php echo $value->auteur_livre ?></td>
            <td><?php echo $value->edition_livre ?></td>
            <td><?php echo $value->prenom_user ?> <?php echo $value->nom_user ?></td>
            <td><?php echo $value->date_emprunt ?></td>
            <td><?php echo $value->retour_emprunt ?></td>


            <td>
                <a href="index.php?controller=livre&action=AffichageLivre&id_livre=<?php echo $value->id_livre ?>">

                    <i class="bi bi-eye-fill"></i>
                </a>
            </td>




        </tr>

    <?php
    } ?>
</table>

<a href="index.php?controller=user&action=index">Retour à la page précédente</a>