<?php



include '../Core/Routeur.php';

include '../Controllers/Controller.php';
include '../Controllers/HomeController.php';
include '../Controllers/LivreController.php';
include '../Controllers/UserController.php';
include '../Controllers/EmpruntController.php';

session_start();


$route = new Routeur();

$route->routes();
