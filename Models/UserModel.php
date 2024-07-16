<?php
include_once '../Core/DbConnect.php';
class UserModel extends DbConnect
{
    // REQUETE QUI VERIFIE SI PASSWORD ET EMAIL USER VONT ENSEMBLE
    // recherche email existant dans la base de données
    public function login(User $loginUser)
    {
        try {
            $this->request =  $this->connection->prepare("SELECT * FROM user
            WHERE email_user=:email_user");
            $this->request->bindValue(':email_user', $loginUser->getEmail_user());
            //$this->request->bindValue(':password_user', $loginUser->getPassword_user());
            $this->request->execute();
            $login_user = $this->request->fetch();
            // var_dump($login_user);
            // die;
            return $login_user;
        } catch (PDOException $e) {
            echo 'Erreur:' . $e->getMessage();
        }
    }


    // inscription nouvel utilisateur (rôle automatiquement sur 0 = utilisateur normal)
    public function newUser(User $user)
    {
        try {

            $requete = $this->connection->prepare("INSERT INTO user (nom_user, prenom_user, email_user, password_user) VALUES (:nom_user, :prenom_user, :email_user, :password_user)");
            $requete->bindValue(':nom_user', $user->getNom_user());
            $requete->bindValue(':prenom_user', $user->getPrenom_user());
            $requete->bindValue(':email_user', $user->getEmail_user());
            $requete->bindValue(':password_user', $user->getPassword_user());

            $newUser = $requete->execute();

            return $newUser;
        } catch (PDOException $e) {
            echo 'Erreur:' . $e->getMessage();
        }
    }

    // REQUETE POUR AFFICHAGE TOUS LES USERS
    public function findAll()
    {
        try {
            $this->request =  $this->connection->prepare("SELECT* FROM user ");
            $this->request->execute();
            $listUser =  $this->request->fetchAll();
            // var_dump($listUser);
            // die;
            return $listUser;
        } catch (PDOException $e) {
            echo 'Erreur:' . $e->getMessage();
        }
    }

    // REQUETE POUR AFFICHAGE D'UN USER EN FONCTION DE L'ID
    public function findUser(User $user)
    {
        try {
            $this->request =  $this->connection->prepare("SELECT* FROM user WHERE id_user= :id_user");
            $this->request->bindValue(":id_user", $user->getId_user());
            $this->request->execute();
            $ficheUser =  $this->request->fetch();
            // var_dump($ficheUser);
            // die;
            return $ficheUser;
        } catch (PDOException $e) {
            echo 'Erreur:' . $e->getMessage();
        }
    }


    // REQUETE POUR MODIFIER LES INFORMATIONS D'UN UTILISATEURS
    public function updateUser(User $info_user)
    {
        try {
            $this->request =  $this->connection->prepare("UPDATE user
        SET id_user = :id_user, nom_user = :nom_user, prenom_user = :prenom_user,
        email_user = :email_user, role_user=':role_user'
    WHERE id_user=:id_user");
            $this->request->bindValue(":id_user", $info_user->getId_user());
            $this->request->bindValue(":nom_user", $info_user->getNom_user());
            $this->request->bindValue(":prenom_user", $info_user->getPrenom_user());
            $this->request->bindValue(":email_user", $info_user->getEmail_user());
            $this->request->bindValue(":role_user", $info_user->getRole_user());
            $modif = $this->request->execute();
            // var_dump($modif);
            // die;
            return $modif;
        } catch (PDOException $e) {
            echo 'Erreur:' . $e->getMessage();
        }
    }

    // REQUETE SUPPRESSION USER
    public function deleteUser(User $id_user)
    {
        try {
            $this->request =  $this->connection->prepare("DELETE FROM user WHERE id_user= :id_user");
            $this->request->bindValue(":id_user", $id_user->getId_user());
            $result = $this->request->execute();
        } catch (PDOException $e) {
            echo 'Erreur:' . $e->getMessage();
        }
    }
}
