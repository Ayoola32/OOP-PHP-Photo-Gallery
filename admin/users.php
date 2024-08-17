<?php include "includes/admin_header.php"; ?>
<?php include "includes/admin_navigation.php"; ?>



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Users
                            <small>Subheading</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Users Page
                            </li>
                        </ol>

                        <?php 
                            if (isset($_GET['source'])) {
                                $source = $_GET['source'];
                            }else {
                                $source = '';
                            }

                            switch ($source) {
                                case 'user_add':
                                    include "includes/user_add.php"; // 
                                    break;

                                case 'user_update':
                                    include "includes/user_update.php"; // 
                                    break;

                                case 'user_delete':
                                    include "includes/user_delete.php"; //
                                    break;

                                default:
                                    include "includes/user_view_all.php"; // 
                                break;
                            }
                        ?> 
                    </div>
         
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>