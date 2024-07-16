<?php


class Routeur
{
    public function routes()
    {

        $controller = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Home';

        $controller = $controller . 'Controller';


        $action = isset($_GET['action']) ? ($_GET['action']) : 'index';


        $controller = new $controller();

        $controller->$action();
    }
}
