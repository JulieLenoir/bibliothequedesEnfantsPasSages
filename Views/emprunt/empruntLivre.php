<?php
$title = 'Collection Livres | Bibliotheque'
?>

<h1>Valider les emprunts de <?php echo $listUser->prenom_user ?> <?php echo $listUser->nom_user ?> </h1>


<table class="table">
    <tr>
        <th scope="col">*</th>
        <th scope="col">Titre</th>
        <th scope="col">Auteur</th>
        <th scope="col">Edition</th>
        <th scope="col">Emprunté par </th>
        <th scope="col">Emprunté le </th>

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

            <td>

                <a href="index.php?controller=emprunt&action=validEmpruntLivre&id_livre=<?php echo $value->id_livre ?>&id_user=<?php echo $listUser->id_user ?>">
                    <i class=" bi bi-plus-circle-fill"></i>
                </a>
            </td>




        </tr>

    <?php
    } ?>
</table>

<a href="index.php?controller=user&action=tableauDeBordUser">Retour à la page précédente</a>