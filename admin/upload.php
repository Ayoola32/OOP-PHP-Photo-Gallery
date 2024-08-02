<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>

      

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Upload
                            <small>Subheading</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>

                        <form action="" method="post" enctype="multipart/form-data">
                            <h2>Add New Photo</h2>


                            <div class="form-group">
                                <label for="title">Photo Title</label>
                                <input type="text" class="form-control" name="title">
                            </div>

                            <div class="form-group">
                                <label for="file_upload">Photo Upload</label>
                                <input type="file" name="file_upload">
                            </div>

                            <div class="form-group">
                                <input class= "btn btn-primary" type="submit" name="submit" value="Add Photo">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include "includes/footer.php"; ?>