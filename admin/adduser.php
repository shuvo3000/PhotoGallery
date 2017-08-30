<?php

include "includes/header.php";


if (!$session->is_signed_in()){

    redirect("login.php");

    //echo '<div class="alert alert-danger"> User not signed in ::: '.$session->is_signed_in().'</div>';
}

$message = "";

    $user = new User();

    if (isset($_POST['submit'])){


        if ($user){

            $user->username = $_POST['username'];
            $user->password = $_POST['password'];
            $user->firstname = $_POST['firstname'];
            $user->lastname = $_POST['lastname'];

            $user->firstname = $_FILES['userimage'];

            $user->saveUser();
            $message = "<div class=\"alert alert-success\">Information Updated</div>";
            //            $user-> = $_POST[''];
            //            $user-> = $_POST[''];
        }

    }



?>


<body>

<div id="wrapper">

    <!-- Navigation -->

    <?php include "includes/top_nav.php"; ?>

    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <?php include "includes/side_nav.php";?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Edit Photos
                        <small>Subheading</small>
                    </h1>

                    <form action="" method="post" enctype="multipart/form-data" >
                        <div class="col-md-8 col-lg-8">
                            <h3 class="alert alert-primary"><?php echo $message; ?>
                            </h3>
                            <div class="form-group">
                                <label for="username">User Name</label>
                                <input type="text" name="username" id="" class="form-control" >

                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="" class="form-control" >

                            </div>
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" name="firstname" id="" class="form-control">

                            </div>
                            <div class="form-group">
                                <label for="lastname">LastName</label>
                                <input type="text" name="lastname" id="" class="form-control" >
                            </div>
                            <div class="form-control">
                                <input type="file" name="userimage">
                            </div>
                            <br><br>
                            <div class="form-group">
                                <input type="submit" name="submit" id="" class="btn btn-primary" value="Add New User">
                            </div>
                        </div>


                    </form>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php include "includes/footer.php";?>
