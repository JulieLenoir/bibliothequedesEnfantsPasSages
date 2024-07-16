<?php
include_once '../Models/UserModel.php';
include_once '../Models/LivreModel.php';
include_once '../Models/EmpruntModel.php';
include_once '../Entities/User.php';
include_once '../Entities/Livre.php';
include_once '../Entities/Emprunt.php';
include_once '../Core/Validator.php';


class EmpruntController extends Controller
{

    public function empruntLivre()
    {

        $id_user = $_GET['id_user'];
        // var_dump($id_user);
        // die;
        $user = new User;
        $user->setId_user($id_user);

        $ficheUser = new UserModel;
        $listUser = $ficheUser->findUser($user);

        $livre = new LivreModel();
        $listLivre = $livre->findAll();
        // var_dump($listLivre);
        // die;


        $this->render('emprunt/empruntLivre', ['listUser' => $listUser, 'listLivre' => $listLivre]);
    }

    public function validEmpruntLivre()
    {

        $id_user = $_GET['id_user'];
        // var_dump($id_user);
        // die;
        $user = new User;
        $user->setId_user($id_user);

        $id_livre = $_GET['id_livre'];
        // var_dump($id_livre);
        // die;
        $livre = new Livre;
        $livre->setId_Livre($id_livre);


        $livreEmprunt = new LivreModel;
        $validLivreEmprunt = $livreEmprunt->valideEmpruntLivre($user, $livre);

        $empruntLivre = new EmpruntModel();
        $empruntLivrevalidé = $empruntLivre->valideEmpruntLivre($livre, $user);
        // var_dump($empruntLivrevalidé);
        // die;

        if ($empruntLivrevalidé == true && $validLivreEmprunt == true) {

            $livreEmprunte = new EmpruntModel();
            $listeLivreEmprunte = $livreEmprunte->findEmpruntUser($user);
            // var_dump($listeLivreEmprunte);
            // die;


            $ficheUser = new UserModel;
            $listUser = $ficheUser->findUser($user);
            $this->render('user/ficheUser', ['listUser' => $listUser, 'listeLivreEmprunte' => $listeLivreEmprunte]);
        }
    }

    public function deleteEmprunt()
    {

        $id_livre = $_GET['id_livre'];
        // var_dump($id_livre);
        // die;
        $livre = new Livre;
        $livre->setId_Livre($id_livre);

        $id_user = $_GET['id_user'];
        // var_dump($id_user);
        // die;
        $user = new User;
        $user->setId_user($id_user);

        $deleteEmprunt = new EmpruntModel();
        $deleteEmpruntValide = $deleteEmprunt->deleteEmprunt($livre);
        // var_dump($deleteEmpruntValide);
        // die;

        if ($deleteEmpruntValide == true) {
            $livreEmprunte = new EmpruntModel();
            $listeLivreEmprunte = $livreEmprunte->findEmpruntUser($user);
            // var_dump($listeLivreEmprunte);
            // die;


            $ficheUser = new UserModel;
            $listUser = $ficheUser->findUser($user);
            $this->render('user/ficheUser', ['listUser' => $listUser, 'listeLivreEmprunte' => $listeLivreEmprunte]);
        }
    }
}
