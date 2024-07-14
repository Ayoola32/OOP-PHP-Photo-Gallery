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
                        $sql = "SELECT * FROM users";
                        $result = $database->query($sql);
                        
                        if ($result) {
                            $user_found = mysqli_fetch_array($result);
                            echo $user_found['username'];
                        } else {
                            echo "No user found.";
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