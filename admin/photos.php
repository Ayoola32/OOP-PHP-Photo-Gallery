<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>

<?php $photos = Photo::find_all();?>
      

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

                        
                        <div class="col-md-12">
                            <table class="table table-bordered hovered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Photo</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Filename</th>
                                        <th>Type</th>
                                        <th>Size</th>
                                        <th>View</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($photos as $photo) : ?>
                                        <tr>
                                            <td><?php echo $photo->photo_id?></td>
                                            <td><img src="<?php echo $photo->picture_path(); ?>" alt="" style="width: 100px; height: auto;"></td>
                                            <td><?php echo $photo->title?></td>
                                            <td><?php echo $photo->description?></td>
                                            <td><?php echo $photo->filename?></td>
                                            <td><?php echo $photo->type?></td>
                                            <td><?php echo $photo->size?></td>
                                            <td><a class='btn btn-warning' href=''>View</a></td>
                                            <td><a class='btn btn-info mr-2' href=''>Edit</a></td>
                                            <td><a class='btn btn-danger' href='includes/photo_delete.php/?photo_id=<?php echo $photo->photo_id;?>'>Delete</a></td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table> 
                        </div>






                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include "includes/footer.php"; ?>