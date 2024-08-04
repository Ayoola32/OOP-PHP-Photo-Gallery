<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Photos
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
                    </div>

                    <?php 
                        // include "includes/post_view_all.php";
                        if (isset($_GET['source'])) {
                            $source = $_GET['source'];
                        }else {
                            $source = '';
                        }

                        switch ($source) {
                            case 'photo_add':
                                include "includes/photo_add.php"; // done
                                break;

                            case 'photo_update':
                                include "includes/photo_update.php"; // done
                                break;

                            case 'photo_delete':
                                include "includes/photo_delete.php"; //done
                                break;

                            default:
                                include "includes/photo_view_all.php"; // done
                            break;
                        }
                    ?>          

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include "includes/footer.php"; ?>