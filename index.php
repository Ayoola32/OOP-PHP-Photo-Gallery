<?php include "includes/header.php";?>
<?php include "includes/navigation.php";?>


<?php $photos = Photo::find_all();?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h2>All Photos Blog</h2>

                <div class="thumbnails row">
                <?php foreach($photos as $photo) : ?>       
                    
                    <div class="col-xs-10 col-md-5">
                        <hr>
                        <p><span class="glyphicon glyphicon-time"></span> <?php echo date('F d, Y \a\t g:i A', strtotime($photo->date));?></p>
                        <a href="post_view.php?photo_id=<?php echo $photo->photo_id;?>" class="thumbnail">
                            <img class="img_responsive home_page_picture"src="admin/<?php echo $photo->picture_path();?>" alt="" srcset="">
                        </a>
                        <h6 class="lead">
                            by <a href="post_view.php?photo_id=<?php echo $photo->photo_id;?>"><?php echo $photo->author?></a>
                        </h6>


                    </div>        
                <?php endforeach;?>
                </div>


                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                
                <?php include "includes/sidebar.php"?>
            </div>

        </div>
        <!-- /.row -->

        <hr>
<?php include "includes/footer.php"?>
