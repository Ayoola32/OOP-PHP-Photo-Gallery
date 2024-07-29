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
                            $user = new User();
                            $user->username = "Sidiq";
                            $user->password = "8899";
                            $user->first_name = "Ayodeji";
                            $user->last_name = "Sidiq";
                            $user->user_email = "a-sidiq@example.com";
                            
                            if ($user->create()) {
                                echo "User created successfully.";
                            } else {
                                echo "Failed to create user.";
                            };
                            

                            // UPDATE USER STATICALLY;
                            // $user = User::find_user_id(17);
                            // if ($user) {
                            //     $user->username = "Sidiiiiiiiq";
                            //     $user->last_name = "Abubaaaaaakar";
                            //     $user->password = "001122";
                            //     $user->update();
                            //     echo "User updated successfully.";
                            // } else {
                            //     echo "User not found.";
                            // }


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