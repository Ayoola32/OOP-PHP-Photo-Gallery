<?php
require_once "admin/classes/init.php";



if (empty($_GET['photo_id']) || !($photo = Photo::find_by_id($_GET['photo_id']))) {
    header("Location: index.php");
    exit();
}

    
if (isset($_POST['submit'])) {
    $author = trim($_POST['author']);
    $content = trim($_POST['content']);
    
    $new_comment = Comment::create_comment($photo->photo_id, $author, $content);
    if ($new_comment) {
        $new_comment->create();
        redirect("post_view.php?photo_id={$photo->photo_id}");
    }else{
        $message = "There was a problem saving your comment";
    } 
}


$comments = Comment::find_the_comments($photo->photo_id);







?>


<?php include "includes/header.php";?>
<?php include "includes/navigation.php";?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
                <div>
                    <h1><?php echo $photo->title?></h1>
                    <p class="lead">
                        by <a href="#"><?php echo $photo->author;?></a>
                    </p>
                    <hr>
                    <p><span class="glyphicon glyphicon-time"></span> <?php echo date('F d, Y \a\t g:i A', strtotime($photo->date));?></p>
                    <hr>
                    <img class="img-responsive" src="admin/<?php echo $photo->picture_path(); ?>" alt="" style="width: 900px; height: 500px;">
                    <hr>
                    <p class="lead">
                        <?php echo $photo->description?>
                    </p>
                    <p class="">
                        Caption:
                        <?php echo $photo->caption?>
                    </p>
                    <hr>
                </div>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <?php if ($session->is_signed_in()): ?>
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post">
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" class="form-control" name="author" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <label for="content">Your Comment</label>
                            <textarea name="content" class="form-control" rows="3" placeholder="Type in your comment"></textarea>
                        </div>
                        <button type="submit" name= "submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
                <?php foreach ($comments as $comment): ?>

                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $comment->author; ?>
                                <small><?php echo date('F d, Y \a\t g:i A', strtotime($comment->date)); ?></small>
                            </h4>
                            <?php echo $comment->content; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class='alert alert-info'>You must be signed in to view or leave comments.</p>
            <?php endif; ?>





            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <?php include "includes/sidebar.php"?>

            </div>

        </div>
        <!-- /.row -->

        <hr>
        <?php include "includes/footer.php"?>
