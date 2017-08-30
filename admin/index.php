<?php include "includes/header.php";


if (!$session->is_signed_in()){

    redirect("login.php");

    //echo '<div class="alert alert-danger"> User not signed in ::: '.$session->is_signed_in().'</div>';
}

?>


<body>

    <div id="wrapper">

        <!-- Navigation -->

        <?php include "includes/top_nav.php"; ?>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<?php include "includes/side_nav.php";?>

        <div id="page-wrapper">

            <?php include "includes/admin_content.php";?>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php include "includes/footer.php";?>
