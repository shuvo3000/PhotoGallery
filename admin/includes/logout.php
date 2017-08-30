<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 8/28/2017
 * Time: 12:36 AM
 */
require_once "header.php";
$session->logout();
redirect("../login.php");
?>