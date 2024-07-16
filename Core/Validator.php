<?php



class Validator
{

    static function postCheck($post)
    {

        static $check = false;


        for ($i = 0; $i < count($post); $i++)
        /*foreach($post as $value)*/ {
            if ($post[$i] != '') {
                $check = true;
            } else {
                $check = false;
            }
        }
        if ($check == true) {
            return true;
        } else {
            return false;
        }
    }
}
