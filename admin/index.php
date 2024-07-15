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
                        // Find all users
                        $all_users = User::find_all_user();

                        // Loop through all users and display their usernames
                        foreach ($all_users as $user) {
                            echo $user->username . "<br>";
                        }

                        // Find a specific user by ID
                        $found_user = User::find_user_id(1);
                        echo $found_user->user_email;

                        // just to confirm the autoload function if working
                        $pic = new Picture();


                        
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