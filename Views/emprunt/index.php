<?php
$title = 'Collection Livres | Bibliotheque'
?>

<h1>Liste des livres</h1>

<a href="index.php?controller=livre&action=add"><button type="button" class="btn btn-primary">Ajouter un livre</button></a>
<table class="table">

    <tr>
        <th scope="col">*</th>
        <th scope="col">Titre</th>
        <th scope="col">Auteur</th>
        <th scope="col">Edition</th>

        <th scope="col">Emprunté par</th>
        <th scope="col">Emprunté le</th>
        <th scope="col">Retour prévu le </th>
        <th scope="col">Ajout du livre à l'utilisateur </th>


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
            <td><?php $retour = $value->date_emprunt;; ?></td>
            <td>
                <!-- ATTENTION REVOIR LE LIEN -->
                <a href="index.php?controller=livre&action=empruntLivre&id_livre=<?php echo $value->id_livre ?>&id_user=<?php echo $id_user ?>">
                    <i class=" bi bi-plus-circle-fill"></i>
                </a>
            </td>




        </tr>

    <?php
    } ?>
</table>

<a href="index.php?controller=user&action=ficheUser&id_user=<?php echo $id_user ?>">Retour à la page précédente</a>