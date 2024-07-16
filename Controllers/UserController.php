<?php
include_once '../Models/UserModel.php';
include_once '../Entities/User.php';
include_once '../Core/Validator.php';



class UserController extends Controller
{

    //METHODE POUR  S'INSCRIRE
    public function register()
    {

        $alerte = '';
        $this->render('user/register', ['alerte' => $alerte]);
    }

    // TRAITEMENT DE L'AJOUT USER à l'inscription 
    public function registertraitement()
    {

        $alerte = '';
        $nom = $_POST['nom_user'];
        $prenom = $_POST['prenom_user'];
        $email = $_POST['email_user'];
        $mdp = $_POST['password_user'];

        $post = [$nom, $prenom, $email, $mdp];

        $result = Validator::postCheck($post); // vérifie que tous les champs sont renseignés

        if ($result == true) {
            $hash = password_hash($mdp, PASSWORD_DEFAULT); // password hashé si renseigné
            $user = new User;
            $user->setNom_user($nom);
            $user->setPrenom_user($prenom);
            $user->setEmail_user($email);
            $user->setPassword_user($hash);

            $userModel = new UserModel;
            $userModel->newUser($user); // données enregistrées

            $alerte = "<div class='alert alert-info' role='alert'>Inscription prise en compte ! Veuillez vous connecter.</div>";

            $this->render('user/login', ['alerte' => $alerte]);
        } else {

            $alerte = "<div class='alert alert-danger' role='alert'> Veuillez remplir tous les champs !</div>";
            $this->render('user/register', ['alerte' => $alerte]);
        }
    }


    //METHODE POUR   AJOUT USER
    public function addUser()
    {

        $alerte = '';
        $this->render('user/addUser', ['alerte' => $alerte]);
    }

    // TRAITEMENT DE L'AJOUT USER
    public function traitementAddUser()
    {

        $alerte = '';
        $nom = $_POST['nom_user'];
        $prenom = $_POST['prenom_user'];
        $email = $_POST['email_user'];
        $mdp = $_POST['password_user'];

        $post = [$nom, $prenom, $email, $mdp];

        $result = Validator::postCheck($post); // vérifie que tous les champs sont renseignés

        if ($result == true) {
            $hash = password_hash($mdp, PASSWORD_DEFAULT); // password hashé si renseigné
            $user = new User;
            $user->setNom_user($nom);
            $user->setPrenom_user($prenom);
            $user->setEmail_user($email);
            $user->setPassword_user($hash);

            $userModel = new UserModel;
            $userModel->newUser($user); // données enregistrées

            $alerte = "<div class='alert alert-info' role='alert'>Ajout pris en compte !</div>";

            header("location:index.php?controller=user&action=tableauDeBordUser");
        } else {

            $alerte = "<div class='alert alert-danger' role='alert'> Veuillez remplir tous les champs !</div>";
            $this->render('user/addUser', ['alerte' => $alerte]);
        }
    }


    // AFFICHAGE FORMULAIRE POUR S'AUTHENTIFIER - action du form envoie vers méthode traitementLogin
    public function login()
    {
        $alerte = '';
        $this->render('user/login', ['alerte' => $alerte]);
    }
    // TRAITEMENT DU FORMULAIRE D'AUTHENTIFICATION (view/user/login) - REQUETE login(User $loginUser)DANS UserModel
    public function traitementLogin()
    {
        $alerte = '';
        $email_user = $_POST['email'] ?? '';
        $password_user = $_POST['password'] ?? '';
        isset($_POST['valider']);
        // var_dump($_POST);
        // die;
        // vérification avec le validator
        $post = [$email_user, $password_user];
        $result = Validator::postCheck($post);
        if ($result == true) {

            $user = new User;

            $user->setEmail_user($email_user);
            // $user->setPassword_user($password_user);
            $traitementLogin = new UserModel;
            $ValidationLogin = $traitementLogin->login($user); //vérifie si l'email tapé existe dans la BDD
            // var_dump($ValidationLogin);
            // die;
            if ($_POST['valider'] = true) {
                // vérifie si l'email est existant et que le mot de passe tapé correspond au hash associé à l'email dans la BDD
                if ($ValidationLogin && password_verify($password_user, $ValidationLogin->password_user)) {
                    $_SESSION['user'] = $_POST['email'];
                    $_SESSION['id_user'] = $ValidationLogin->id_user;
                    $_SESSION['prenom_user'] = $ValidationLogin->prenom_user;
                    $_SESSION['role'] = $ValidationLogin->role_user;
                    // var_dump($_SESSION);
                    // die;
                    $this->render('user/index');
                } else {
                    // si le mot de passe ne correspond pas ou que l'email est inconnu
                    $alerte = "<div class='alert alert-danger' role='alert'>Mauvais couple login/mot de passe ! </div>";
                    $this->render('user/login', ['alerte' => $alerte]);
                }
            }
        } else {

            //si tous les champs ne sont pas complétés
            $alerte = "<div class='alert alert-danger' role='alert'> Veuillez remplir tous les champs !</div>";
            $this->render('user/login', ['alerte' => $alerte]);
        }
    }

    public function index()
    {

        $this->render('user/index');
    }



    // METHODE POUR SE DECONNECTEE -LIEN DANS CONTROLLER

    public function logout()
    {

        session_unset();
        $this->render('home/index');
    }

    // AFFICHAGE TOUS LES USERS PANNEAU ADMIN 

    public function tableauDeBordUser()
    {
        $user = new UserModel();
        $listUser = $user->findAll();
        // var_dump($listUser);
        // die;


        $this->render('user/tableauDeBordUser', ['listUser' => $listUser]);
    }



    public function ficheUser()
    {
        $id_user = $_GET['id_user'];
        // var_dump($id_user);
        // die;
        $user = new User;
        $user->setId_user($id_user);


        $ficheUser = new UserModel;
        $listUser = $ficheUser->findUser($user);
        // var_dump($listUser);
        // die;



        $livreEmprunte = new EmpruntModel();
        $listeLivreEmprunte = $livreEmprunte->findEmpruntUser($user);
        // var_dump($listeLivreEmprunte);
        // die;

        $this->render('user/ficheUser', ['listUser' => $listUser, 'listeLivreEmprunte' => $listeLivreEmprunte]);
    }



    // METHODE POUR AFFICHAGE DU FORMULAIRE PAR USER
    public function updateUser()
    {
        $id_user = $_GET['id_user'];
        // var_dump($id_user);
        // die;
        $user = new User;
        $user->setId_user($id_user);


        $ficheUser = new UserModel;
        $affichageFiche = $ficheUser->findUser($user);
        $this->render('user/updateUser', ['affichageFiche' => $affichageFiche]);
    }
    // METHODE POUR TRAITER LA MODIFICATION D'UN USER
    public function traitementUpdateUser()
    {

        // recuperation des données en GET et POST
        $id_user = $_GET['id_user'];
        $nom_user = $_POST['nom_user'] ?? '';
        $prenom_user = $_POST['prenom_user'] ?? '';
        $email_user = $_POST['email_user'] ?? '';

        // on hydrate les données
        $user = new User;
        $user->setId_user($id_user);
        $user->setNom_user($nom_user);
        $user->setPrenom_user($prenom_user);
        $user->setEmail_user($email_user);

        // on instancie le model pour faire appel à la requete
        $updateUser = new UserModel;
        $traitementUpdateUser = $updateUser->updateUser($user);
        // var_dump($modifUser);
        // die;
        header('location:index.php?controller=user&action=tableauDebordUser');
    }

    // METHODE POUR AFFICHER PAGE TRANSITOIRE POUR SUPPRIMER USER
    public function deleteUser()
    {
        $id_user = $_GET['id_user'] ?? '';

        $user = new User;
        $user->setId_user($id_user);

        $deleteUser = new UserModel;
        $affichageUser = $deleteUser->findUser($user);
        // var_dump($affichageUser);
        // die;
        $this->render('user/deleteUser', ['affichageUser' => $affichageUser]);
    }
    // METHODE POUR SUPPRESSION USER
    public function traitementDelete()
    {
        $id_user = $_GET['id_user'] ?? '';
        // var_dump($id_user);
        // die;
        $user = new User;
        $user->setId_user($id_user);


        $deleteUser = new UserModel;
        $delete = $deleteUser->deleteUser($user);
        // var_dump($delete);
        // die;
        header('location: index.php?controller=user&action=tableauDeBordUser');
    }
}
