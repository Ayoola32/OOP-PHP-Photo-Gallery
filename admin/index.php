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
                            // $user->username = "Sidiqueeeeeeee";
                            // $user->password = "8899000";
                            // $user->first_name = "Ayodeji32";
                            // $user->last_name = "Sidique";
                            // $user->user_email = "a-sidiq@example.com";
                            
                            // if ($user->create()) {
                            //     echo "User created successfully.";
                            // } else {
                            //     echo "Failed to create user.";
                            // };
                            

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


                            // SEARCH FOR ALL PHOTO DETALS STATICALLY;
                            // $photos = Photo::find_all();
                            // if ($photos) {
                            //     foreach ($photos as $photo) {
                            //        echo $photo->filename;
                            //     }
                            // } else {
                            //     echo "No record found.";
                            // }

                            
                            // INSERTING INTO THE DATABASE STATICALLY;
                            // $photo = new Photo();
                            // $photo->title = "Convocation Image";
                            // $photo->description = "2024 Graduation";
                            // $photo->filename = "convo2.jpeg";
                            // $photo->type = "jpeg";
                            // $photo->size = "11";
                            
                            // if ($photo->create()) {
                            //     echo "Photo record created successfully.";
                            // } else {
                            //     echo "Failed to create record.";
                            // };

                        
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