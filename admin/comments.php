<?php include "includes/admin_header.php"; ?>
<?php include "includes/admin_navigation.php"; ?>

      

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Comments
                            <small>Subheading</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Comments Page
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
                            case 'comment_delete':
                                include "includes/comment_delete.php"; 
                                break;
                            
                            default:
                                include "includes/comment_view_all.php";
                            break;
                        }
                    ?>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>