<?php

class Livre
{
    private $id_livre;
    private $titre_livre;
    private $auteur_livre;
    private $edition_livre;
    private $couverture_livre;
    private $dateEmprunt_livre;
    private $id_user;


    /**
     * Get the value of id_livre
     */
    public function getId_livre()
    {
        return $this->id_livre;
    }

    /**
     * Set the value of id_livre
     *
     * @return  self
     */
    public function setId_livre($id_livre)
    {
        $this->id_livre = $id_livre;

        return $this;
    }

    /**
     * Get the value of titre_livre
     */
    public function getTitre_livre()
    {
        return $this->titre_livre;
    }

    /**
     * Set the value of titre_livre
     *
     * @return  self
     */
    public function setTitre_livre($titre_livre)
    {
        $this->titre_livre = $titre_livre;

        return $this;
    }

    /**
     * Get the value of auteur_livre
     */
    public function getAuteur_livre()
    {
        return $this->auteur_livre;
    }

    /**
     * Set the value of auteur_livre
     *
     * @return  self
     */
    public function setAuteur_livre($auteur_livre)
    {
        $this->auteur_livre = $auteur_livre;

        return $this;
    }

    /**
     * Get the value of edition_livre
     */
    public function getEdition_livre()
    {
        return $this->edition_livre;
    }

    /**
     * Set the value of edition_livre
     *
     * @return  self
     */
    public function setEdition_livre($edition_livre)
    {
        $this->edition_livre = $edition_livre;

        return $this;
    }

    /**
     * Get the value of couverture_livre
     */
    public function getCouverture_livre()
    {
        return $this->couverture_livre;
    }

    /**
     * Set the value of couverture_livre
     *
     * @return  self
     */
    public function setCouverture_livre($couverture_livre)
    {
        $this->couverture_livre = $couverture_livre;

        return $this;
    }

    /**
     * Get the value of dateEmprunt_livre
     */
    public function getDateEmprunt_livre()
    {
        return $this->dateEmprunt_livre;
    }

    /**
     * Set the value of dateEmprunt_livre
     *
     * @return  self
     */
    public function setDateEmprunt_livre($dateEmprunt_livre)
    {
        $this->dateEmprunt_livre = $dateEmprunt_livre;

        return $this;
    }

    /**
     * Get the value of id_user
     */
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }
}
