<?php

include "includes/header.php";


if (!$session->is_signed_in()){

    redirect("login.php");

    //echo '<div class="alert alert-danger"> User not signed in ::: '.$session->is_signed_in().'</div>';
}

$message = "";


if (empty($_GET['photoid'])){
    redirect("photos.php");
}
elseif(isset($_GET['photoid'])){
    $photo = Photo::findByID($_GET['photoid']);

    if (isset($_POST['update'])){


        if ($photo){

            $photo->title = $_POST['title'];
            $photo->caption = $_POST['caption'];
            $photo->alternatetext = $_POST['alternatetext'];
            $photo->description = $_POST['description'];

            $photo->save();
            $message = "<div class=\"alert alert-success\">Information Updated</div>";
            //            $photo-> = $_POST[''];
            //            $photo-> = $_POST[''];
        }

    }


}
else{

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
                                    <label for="title">Photo Title</label>
                                    <input type="text" name="title" id="" class="form-control" value="<?php  echo $photo->title; ?>">

                                </div>
                                <div class="form-group">

                                    <a href="#" class="thumbnail"><img src="<?php  echo $photo->picturePath(); ?>" alt="<?php  echo $photo->alternatetext; ?>" ></a>

                                </div>
                                <div class="form-group">
                                    <label for="caption">Caption</label>
                                    <input type="text" name="caption" id="" class="form-control" value="<?php  echo $photo->caption; ?>">

                                </div>
                                <div class="form-group">
                                    <label for="alternatetext">Alternate text</label>
                                    <input type="text" name="alternatetext" id="" class="form-control" value="<?php  echo $photo->alternatetext; ?>">

                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="" cols="30" rows="10" class="form-control" ><?php  echo $photo->description; ?>
                                    </textarea>

                                </div>
                            </div>
                                <div class="col-md-4 col-lg-4">
                                    <div class="photo-info-box panel-primary">
                                        <div class="info-box-header panel-heading">
                                            <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                                        </div>

                                        <div class="inside">
                                            <div class="box-inner">
                                                <p class="text">
                                                    <span class="glyphicon glyphicon-calendar"> Uploaded on: April 22, 2030  5.26</span>

                                                </p>

                                                <p class="text">
                                                    Photo ID : <span class="data photo_id_box"><?php  echo $photo->id; ?></span>
                                                </p>
                                                <p class="text">File Name : <span class="data"><?php  echo $photo->filename; ?></span></p>

                                                <p class="text">File Type : <span class="data">JPG</span></p>

                                                <p class="text">File Size : <Span class="data"><?php  echo $photo->size; ?></Span></p>

                                            </div>
                                            <div class="info-box-footer clearfix">
                                                <div class="info-box-delete pull-left">
                                                    <a href="deletephoto.php?photoid=<?php  echo $photo->id; ?>" class="btn btn-danger btn-lg">Delete</a>
                                                </div>

                                                <div class="info-box-update pull-right"><input type="submit"
                                                                                               value="Update"
                                                                                               name="update"
                                                                                               class="btn btn-primary btn-lg">
                                                </div>


                                            </div>

                                        </div>

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
