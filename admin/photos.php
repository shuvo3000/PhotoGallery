<?php include "includes/header.php";

if (!$session->is_signed_in()){

    redirect("login.php");

    //echo '<div class="alert alert-danger"> User not signed in ::: '.$session->is_signed_in().'</div>';
}


$photos = Photo::findAll();

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
                        PHOTOS
                        <small>Subheading</small>
                    </h1>
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                                <th>Photo</th>
                                <th>ID</th>
                                <th>Title</th>
                                <th>File Name</th>
                                <th>Size</th>
                            </thead>
                            <tbody>
                            <?php 
                                foreach ($photos as $photo):
                            
                            ?>

                            <tr>
                                <td><img src="<?php  echo $photo->picturePath(); ?>" width="62px" alt="sample image">
                                    <div class="pictures-link">
                                        <a href="deletephoto.php?photoid=<?php  echo $photo->id; ?>" class="btn btn-danger btn-sm">Delete</a>
                                        <a href="editphoto.php?photoid=<?php  echo $photo->id; ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="viewphoto.php?photoid=<?php  echo $photo->id; ?>" class="btn btn-success btn-sm">View</a>
                                    </div>
                                </td>
                                <td><?php  echo $photo->id; ?> </td>
                                <td><?php  echo $photo->title; ?></td>
                                <td><?php  echo $photo->filename; ?></td>
                                <td><?php  echo $photo->size; ?></td>
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
