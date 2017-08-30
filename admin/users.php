<?php include "includes/header.php";

if (!$session->is_signed_in()){

    redirect("login.php");

    //echo '<div class="alert alert-danger"> User not signed in ::: '.$session->is_signed_in().'</div>';
}


$users = User::findAll();

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
                        All Users

                    </h1>

                    <a href="adduser.php" class="btn btn-lg btn-primary">Add New User</a>

                    <h4 id=""><?php

                            if(isset($_GET['msg'])){
                                echo $_GET['msg'];
                            }
                        ?>
                      </h4>
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                            <th>Photo</th>
                            <th>ID</th>
                            <th>User Name</th>
                            <th>First Name</th>
                            <th>last Name</th>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($users as $user):

                                ?>

                                <tr>
                                    <td><img src="<?php  echo $user->picturePath(); ?>" width="62px" alt="sample image">
                                        <div class="pictures-link">
                                            <a href="ops/deleteuser.php?userid=<?php  echo $user->id; ?>" class="btn btn-danger btn-sm">Delete</a>
                                            <a href="ops/edituser.php?userid=<?php  echo $user->id; ?>" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="ops/viewuser.php?userid=<?php  echo $user->id; ?>" class="btn btn-success btn-sm">View</a>
                                        </div>
                                    </td>
                                    <td><?php  echo $user->id; ?> </td>
                                    <td><?php  echo $user->username; ?></td>
                                    <td><?php  echo $user->firstname; ?></td>
                                    <td><?php  echo $user->lastname; ?></td>
                                </tr>
                            <?php endforeach;; ?>

                            </tbody>
                        </table>
                    </div>
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
