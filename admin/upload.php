<?php

include "includes/header.php";


if (!$session->is_signed_in()){

    redirect("login.php");

    //echo '<div class="alert alert-danger"> User not signed in ::: '.$session->is_signed_in().'</div>';
}

$message = "";
if (isset($_POST['submit'])){

    $photo = new Photo();

    $photo->title = $_POST['title'];
    $photo->setFile($_FILES['fileupload']);

    if ($photo->save()){
        $message = "Photo uploaded successfully";
    }
    else{

        $message = join("<br>", $photo->errors);
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
                        UPLOAD
                        <small>Subheading</small>
                    </h1>
                    <div class="col-md-6">
                        <h3 class="alert alert-primary"><?php echo $message; ?>
                        </h3>
                        <form action="upload.php" method="post" enctype="multipart/form-data" >
                            <div class="form-group">
                                <input type="text" name="title" id="" class="form-control">

                            </div>
                            <div class="form-group">
                                <input type="file" name="fileupload" id="">

                            </div>

                            <div class="form-group">
                                <input type="submit" name="submit" id="" class="btn btn-primary" value="Submit">

                            </div>

                        </form>
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
<!--<form action="editphoto.php" method="post" enctype="multipart/form-data" >
    <div class="col-md-8 col-lg-8">
        <h3 class="alert alert-primary"><?php /*echo $message; */?>
        </h3>
        <div class="form-group">
            <label for="title">Photo Title</label>
            <input type="text" name="title" id="" class="form-control">

        </div>
        <div class="form-group">
            <label for="caption">Caption</label>
            <input type="text" name="caption" id="" class="form-control">

        </div>
        <div class="form-group">
            <label for="alternatetext">Alternate text</label>
            <input type="text" name="alternatetext" id="" class="form-control">

        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>

        </div>
    </div>
    <div class="col-md-4 col-lg-4">
        <div class="photo-info-box panel-primary">
            <div class="info-box-header panel-heading">
                <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
            </div>
-->
<?php include "includes/footer.php";?>
