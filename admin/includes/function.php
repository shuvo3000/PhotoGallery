<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 8/27/2017
 * Time: 6:22 PM
 */

function __autoload($class){

    $class = strtolower($class);

    $thePath = "includes/{$class}.php";

    if (file_exists($thePath))
    {
        require_once ($thePath);
    }
    else
        die("<BR> The file name {$class} was not found....");

}

function redirect($pageName){

    header("Location: ".$pageName);

}