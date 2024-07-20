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
                            // $user->username = "Abusidiq";
                            // $user->password = "2262";
                            // $user->first_name = "Abubakar";
                            // $user->last_name = "Abdul";
                            // $user->user_email = "abubakar@example.com";
                            
                            // $user->create();
                            
                            // UPDATE USER STATICALLY;
                            $user = User::find_user_id(6);
                            if ($user) {
                                $user->username = "Twilight";
                                $user->last_name = "Tawakalit";
                                $user->update();
                                echo "User updated successfully.";
                            } else {
                                echo "User not found.";
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
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include "includes/footer.php"; ?>