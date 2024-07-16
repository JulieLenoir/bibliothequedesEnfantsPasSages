<?php
$title = 'Authentification - Bibliotheque';
?>
<!-- FORMULAIRE DE CONNEXION -->
<h1 style="text-align: center;">Connectez-vous à votre compte</h1>
<?= $alerte ?>
<!-- ENVOIE VERS UserController METHODE traitementLogin -->
<form action="index.php?controller=user&action=traitementLogin" method="post" class="d-flex flex-column mb-3 row g-3 align-items-center" style="margin:0 auto;">
    <div class="w-50 p-3">
        <label for="exampleFormControlInput1" class="form-label"></label>
        <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="nom@exemple.com">
    </div>
    <div class="w-50 p-3">
        <label for="inputPassword2" class="visually-hidden">Password</label>
        <input name="password" type="password" class="form-control" id="inputPassword2" placeholder="Mot de Passe">
    </div>
    <div class="w-50 p-3">
        <button name="valider" type="buttonLogin" class="btn btn-primary mb-3">Valider</button>
    </div>
    <!-- LIEN VERS FORMULAIRE DINSCRIPTION - UserController METHODE register -->
    <h6 style="text-align:center;">Si vous n'avez pas de compte :
        <a href="index.php?controller=user&action=register">Cliquez-ici pour vous inscrire</a>
    </h6>
</form>