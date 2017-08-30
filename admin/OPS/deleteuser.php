<?php

include "../includes/header.php";


if (!$session->is_signed_in()){

    redirect("../login.php");
}


if(empty($_GET['userid'])){

    redirect("../users.php");

}

$user = User::findByID($_GET['userid']);

if($user){
    $user->deleteUser();
    $msg = "<div class=\"alert alert-success\">User Name : ".$user->username." deleted successfully</div>";
    redirect("../users.php?msg=".$msg);


}else
{
    redirect("../users.php");
}


?>
<?php include "../includes/footer.php";?>

