<?php
include_once '../Core/DbConnect.php';
class LivreModel extends DbConnect
{
    // REQUETE POUR AFFICHAGE TOUS LES LIVRES
    public function findAll()
    {
        try {
            $this->request =  $this->connection->prepare("SELECT
             livre.id_livre, livre.titre_livre, livre.auteur_livre, livre.edition_livre, livre.couverture_livre, 
            emprunt.id_emprunt, emprunt.date_emprunt,emprunt.retour_emprunt, emprunt.id_user,
            user.nom_user, user.prenom_user, user.email_user
     FROM livre
     LEFT JOIN emprunt ON livre.id_livre = emprunt.id_livre
     LEFT JOIN user ON emprunt.id_user = user.id_user;
     
             ");
            $this->request->execute();
            $listLivre =  $this->request->fetchAll();
            // var_dump($listLivre);
            // die;
            return $listLivre;
        } catch (PDOException $e) {
            echo 'Erreur:' . $e->getMessage();
        }
    }


    // REQUETE POUR AFFICHAGE 1  LIVRE
    public function findLivre(Livre $livre)
    {
        try {
            $this->request =  $this->connection->prepare("SELECT * FROM livre WHERE id_livre=:id_livre");
            $this->request->bindValue(':id_livre', $livre->getId_livre());
            $this->request->execute();
            $Livre =  $this->request->fetch();
            // var_dump($Livre);
            // die;
            return $Livre;
        } catch (PDOException $e) {
            echo 'Erreur:' . $e->getMessage();
        }
    }







    // REQUETE POUR AJOUT LIVRE
    public function addLivre(Livre $livre)
    {
        try {

            $requete = $this->connection->prepare("INSERT INTO livre (titre_livre, auteur_livre, edition_livre) VALUES (:titre_livre, :auteur_livre, :edition_livre)");
            $requete->bindValue(':titre_livre', $livre->getTitre_livre());
            $requete->bindValue(':auteur_livre', $livre->getAuteur_livre());
            $requete->bindValue(':edition_livre', $livre->getEdition_livre());


            $newLivre = $requete->execute();

            return $newLivre;
        } catch (PDOException $e) {
            echo 'Erreur:' . $e->getMessage();
        }
    }


    public function valideEmpruntLivre(User $user, Livre $livre)
    {


        try {

            $requete = $this->connection->prepare("UPDATE livre SET id_user=:id_user WHERE id_livre=:id_livre");

            $requete->bindValue(':id_user', $user->getId_User());
            $requete->bindValue(':id_livre', $livre->getId_livre());

            $newEmprunt = $requete->execute();
            // var_dump($newEmprunt);
            // die;
            return $newEmprunt;
        } catch (PDOException $e) {
            echo 'Erreur:' . $e->getMessage();
        }
    }

    public function deleteLivre(Livre $livre)
    {
        try {
            $this->request =  $this->connection->prepare("DELETE FROM livre WHERE id_livre= :id_livre");
            $this->request->bindValue(":id_livre", $livre->getId_livre());
            $result = $this->request->execute();
            // var_dump($result);
            // die;
            return $result;
        } catch (PDOException $e) {
            echo 'Erreur:' . $e->getMessage();
        }
    }
}
