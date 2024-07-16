
<?php
include_once '../Core/DbConnect.php';
class EmpruntModel extends DbConnect
{




    public function valideEmpruntLivre(Livre $livre, User $user)
    {
        try {

            $requete = $this->connection->prepare("INSERT INTO emprunt (date_emprunt, id_livre, id_user) VALUES (NOW(), :id_livre, :id_user)");
            $requete->bindValue(':id_livre', $livre->getId_livre());
            $requete->bindValue(':id_user', $user->getId_User());



            $newEmprunt = $requete->execute();
            // var_dump($newEmprunt);
            // die;
            return $newEmprunt;
        } catch (PDOException $e) {
            echo 'Erreur:' . $e->getMessage();
        }
    }

    public function findEmprunt()
    {
        try {
            $this->request =  $this->connection->prepare("SELECT*FROM
            emprunt
        LEFT JOIN
            user ON emprunt.id_user = user.id_user
            LEFT JOIN livre ON emprunt.id_livre = livre.id_livre ");
            $this->request->execute();
            $listLivre =  $this->request->fetchAll();
            // var_dump($listLivre);
            // die;
            return $listLivre;
        } catch (PDOException $e) {
            echo 'Erreur:' . $e->getMessage();
        }
    }

    public function findEmpruntUser(User $user)
    {
        try {
            $this->request =  $this->connection->prepare("SELECT*FROM
            livre
        LEFT JOIN
            emprunt ON livre.id_livre = emprunt.id_livre
            LEFT JOIN user ON emprunt.id_user = user.id_user WHERE  emprunt.id_user = :id_user ");
            $this->request->bindValue(':id_user', $user->getId_User());
            $this->request->execute();
            $listLivre =  $this->request->fetchAll();
            // var_dump($listLivre);
            // die;
            return $listLivre;
        } catch (PDOException $e) {
            echo 'Erreur:' . $e->getMessage();
        }
    }

    public function deleteEmprunt(Livre $livre)
    {
        try {
            $this->request =  $this->connection->prepare("DELETE FROM emprunt WHERE id_livre= :id_livre");
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
