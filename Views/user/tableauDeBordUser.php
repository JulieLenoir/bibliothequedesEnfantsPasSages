<?php


$title = 'Tableau de Bord User - Bibliotheque';
?>
<a href="index.php?controller=user&action=addUser"><button type="button" class="btn btn-primary">Ajouter un/une utilisateur(trice)</button></a>
<table class="table">

    <tr>
        <th scope="col">*</th>
        <th scope="col">Nom</th>
        <th scope="col">Prenom</th>
        <th scope="col">Email</th>
        <th scope="col">Détail</th>
        <th scope="col">Modifier</th>
        <th scope="col">Supprimer</th>
        <th scope="col">Ajout Emprunt </th>

    </tr>



    <?php
    foreach ($listUser as $value) {
        // var_dump($listUser);
        // die;
    ?>
        <tr>
            <td><?php echo $value->id_user ?> </td>
            <td><?php echo $value->nom_user ?> </td>
            <td><?php echo $value->prenom_user ?></td>
            <td><?php echo $value->email_user ?></td>


            <td>
                <a href="index.php?controller=user&action=ficheUser&id_user=<?php echo $value->id_user ?>">
                    <i class="bi bi-eye-fill"></i>
                </a>
            </td>


            <td>
                <a href="index.php?controller=user&action=updateUser&id_user=<?php echo $value->id_user ?>">
                    <i class="bi bi-pencil-fill"></i>
                </a>
            </td>


            <td>
                <a href="index.php?controller=user&action=deleteUser&id_user=<?php echo $value->id_user ?>">
                    <i class="bi bi-trash3-fill"></i>
                </a>
            </td>
            <td>
                <a href="index.php?controller=emprunt&action=empruntLivre&id_user=<?php echo $value->id_user ?>">
                    <i class=" bi bi-plus-circle-fill"></i>
                </a>
            </td>
        </tr>

    <?php
    } ?>
</table>