<?php


abstract class DbConnect
{
    protected $connection;
    protected $request;

    const SERVER = "localhost";
    const USER = "root";
    const PASSWORD = "";
    const BASE = "biblio_ecf2";

    public function __construct()
    {


        try {
            $this->connection = new PDO("mysql:host=" . self::SERVER . "; dbname=" . self::BASE, self::USER, self::PASSWORD);



            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

            $this->connection->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }
}
