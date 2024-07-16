<?php

class Emprunt
{
    private $id_emprunt;
    private $date_emprunt;
    private $nombre_emprunt;
    private $id_user;
    private $id_livre;


    /**
     * Get the value of id_emprunt
     */
    public function getId_emprunt()
    {
        return $this->id_emprunt;
    }

    /**
     * Set the value of id_emprunt
     *
     * @return  self
     */
    public function setId_emprunt($id_emprunt)
    {
        $this->id_emprunt = $id_emprunt;

        return $this;
    }

    /**
     * Get the value of date_emprunt
     */
    public function getDate_emprunt()
    {
        return $this->date_emprunt;
    }

    /**
     * Set the value of date_emprunt
     *
     * @return  self
     */
    public function setDate_emprunt($date_emprunt)
    {
        $this->date_emprunt = $date_emprunt;

        return $this;
    }

    /**
     * Get the value of nombre_emprunt
     */
    public function getNombre_emprunt()
    {
        return $this->nombre_emprunt;
    }

    /**
     * Set the value of nombre_emprunt
     *
     * @return  self
     */
    public function setNombre_emprunt($nombre_emprunt)
    {
        $this->nombre_emprunt = $nombre_emprunt;

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
}
