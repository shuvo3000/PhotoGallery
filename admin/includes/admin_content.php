<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Admin
                <small>Subheading</small>
            </h1>

            <?php

            //$user = new User();

//            $users = User::findAllUsers();
//            //$result = User::findAllUsers();
//            //$user = mysqli_fetch_array($result);
//
//            foreach ($users as $user){
//
//                echo $user->username."<br>";
//                echo $user->firstname."<br>";
//                echo $user->lastname."<br>";
//                echo $user->id."<br>";
//                echo $user->password."<br>";
//
//
//            }

//            echo User::findUsersByID($_SESSION['user_id'])->username;


//              $user->delete();

//              $user->firstname = "Safoan";
//              $user->lastname = "Bin Rashid";
//              $user->password = "!@#$%^";
//              $user->username = $user->firstname.date('dmy');



            //$user->update();

            //echo "<br>User last name : ".$user->lastname."<br>";
/*            $p = new Photo();
            $p->title="Jungle photo".time();
            $p->description= "asdfjhasdjhfkasjdhfkajshdfj";
            $p->filename = "jungle".time().".png";
            $p->type = ".png";
            $p->size = time();

            $p->create();*/

            

                        $photo = Photo::findAll();

                        foreach ($photo as $p){

                            echo "<br>Photo title : ".$p->title;
                            echo "<br>Photo description : ".$p->description;
                            echo "<br>Photo file name : ".$p->filename;
                            echo "<br>Photo type : ".$p->type;
                            echo "<br>Photo size : ".$p->size."<br><br>";


                        }



            ?>

            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

</div>