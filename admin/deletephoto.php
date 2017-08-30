<?php

include "includes/header.php";


if (!$session->is_signed_in()){

    redirect("login.php");
}


if(empty($_GET['photoid'])){

    redirect("photos.php");
    echo "Photo ID not found";
}

$photo = Photo::findByID($_GET['photoid']);

if($photo){
    $photo->deletePhoto();
    redirect("photos.php");

}else
{
    redirect("photos.php");
}


?>