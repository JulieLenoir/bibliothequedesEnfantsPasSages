<?php
include_once '../Models/UserModel.php';
include_once '../Models/LivreModel.php';
include_once '../Models/EmpruntModel.php';
include_once '../Entities/User.php';
include_once '../Entities/Livre.php';
include_once '../Core/Validator.php';



class LivreController extends Controller
{
    public function index()
    { {


            $livre = new LivreModel();
            $listLivre = $livre->findAll();
            // var_dump($listLivre);
            // die;


            $this->render('livre/index', ['listLivre' => $listLivre]);
        }
    }
    // TRAITEMENT DE L'AJOUT Livre
    public function addLivre()
    {
        $this->render('livre/addLivre');
    }

    public function traitementAddLivre()
    {
        $titre_livre = $_POST['titre_livre'];
        $auteur_livre = $_POST['auteur_livre'];
        $edition_livre = $_POST['edition_livre'];

        $post = [$titre_livre, $auteur_livre, $edition_livre];
        $result = Validator::postCheck($post); // vérifie que tous les champs sont renseignés
        $alerte = '';
        if ($result == true) {


            $livre = new Livre;
            $livre->setTitre_livre($titre_livre);

            $livre->setAuteur_livre($auteur_livre);
            $livre->setEdition_livre($edition_livre);

            $livreModel = new LivreModel;
            $livreModel->addLivre($livre); // données enregistrées
            // var_dump($livreModel);
            // die;

            $alerte = "<div class='alert alert-info' role='alert'>Ajout pris en compte !</div>";


            header('Location:index.php?controller=livre&action=index');
        } else {

            $alerte = "<div class='alert alert-danger' role='alert'> Veuillez remplir tous les champs !</div>";
            $this->render('livre/addLivre', ['alerte' => $alerte]);
        }
    }


    // AFFICHAGE UN LIVRE
    public function AffichageLivre()
    {
        $id_livre = $_GET['id_livre'];
        // var_dump($id_livre);
        // die;
        $livre = new Livre;
        $livre->setId_livre($id_livre);

        $findLivre = new LivreModel();
        $listLivre = $findLivre->findLivre($livre);
        // var_dump($listLivre);
        // die;


        $this->render('livre/ficheLivre', ['listLivre' => $listLivre]);
    }

    // SUPPRIMER LIVRE 
    public function deleteLivre()
    {
        $id_livre = $_GET['id_livre'];
        // var_dump($id_livre);
        // die;
        $livre = new Livre;
        $livre->setId_livre($id_livre);

        $findLivre = new LivreModel();
        $deleteLivre = $findLivre->deleteLivre($livre);
        // var_dump($deleteLivre);
        // die;

        header('location:index.php?controller=livre&action=index');
    }
}
