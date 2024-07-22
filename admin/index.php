<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>

      

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin 
                            <small>Subheading</small>
                        </h1>

                        <?php
                        // INSERTING INTO THE DATABASE STATICALLY;
                            // $user = new User();
                            // $user->username = "Abusidiq32";
                            // $user->password = "2262";
                            // $user->first_name = "Abubakar";
                            // $user->last_name = "Abdul";
                            // $user->user_email = "abubakar@example.com";
                            
                            // $user->create();
                            

                            // UPDATE USER STATICALLY;
                            $user = User::find_user_id(15);
                            if ($user) {
                                $user->username = "Twilight0202";
                                $user->last_name = "Tawakalit0000";
                                $user->update();
                                echo "User updated successfully.";
                            } else {
                                echo "User not found.";
                            }


                            //DELETE USER
                            // $user = User::find_user_id(13);
                            // if ($user) {
                            //     $user->delete();
                            //     echo "User Deleted Successfully.";
                            // } else {
                            //     echo "User not found.";
                            // }


                        
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
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include "includes/footer.php"; ?>