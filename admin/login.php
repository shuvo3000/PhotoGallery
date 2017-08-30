<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 8/27/2017
 * Time: 7:48 PM
 */
require_once "includes/header.php";
$the_message = '';

if ($session->is_signed_in()){

    //echo "Inside isset if for session is set";
    redirect("index.php");
}



if (isset($_POST['submit'])){

    //echo $_POST['username'];

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    //echo $username.$password;
    //Use$gr::

    $user_found = User::verifyUser($username, $password);


    if ($user_found){
        $session->login($user_found);
        echo '<div class="alert alert-success"> User signed in ::: '.$session->is_signed_in().'</div>';
        redirect("index.php");
    }else{

        $the_message = "Your username or password is incorrect";
    }



}else{

    $username = '';
    $password = '';
    //echo "isset not working else if";
}
?>


<!--div.col-md-4.col-md-offset-5>form[method="post"]>((div.form-group>(label{Username}+input.form-control[type="text" name="username"]))+(div.form-group>label{Password}+input.form-control[type="text" name="password"]))-->
<div class="col-md-4 col-md-offset-3">
    <h3 class="bg-danger"><?php echo $the_message;?></h3>
    <form id="login-form" role="form" autocomplete="on" class="form" method="post">

        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>

                <input name="username" type="text" class="form-control" placeholder="Enter Username" value="<?php echo htmlentities($username);?>" required>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
                <input name="password" type="password" class="form-control" placeholder="Enter Password" value="<?php echo htmlentities($password);?>" required>
            </div>
        </div>


        <div class="form-group">

            <input name="submit" class="btn btn-lg btn-primary btn-block" value="Login" type="submit">
        </div>


    </form>
</div>


<?php require_once "includes/footer.php"; ?>
