<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>

<?php
// Setting up pagination
$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$items_per_page = 6;
$total_items = Photo::count_all();

$paginator = new Paginator($page, $items_per_page, $total_items);

// Fetching photos for the current page
$photos = Photo::find_by_pagination($items_per_page, $paginator->offset());
?>







<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <h2>All Photos Blog</h2>

            <div class="thumbnails row">
                <?php foreach ($photos as $photo) : ?>
                    <div class="col-xs-10 col-md-5">
                        <hr>
                        <p><span class="glyphicon glyphicon-time"></span> <?php echo date('F d, Y \a\t g:i A', strtotime($photo->date)); ?></p>
                        <a href="post_view.php?photo_id=<?php echo $photo->photo_id; ?>" class="thumbnail">
                            <img class="img_responsive home_page_picture" src="admin/<?php echo $photo->picture_path(); ?>" alt="">
                        </a>
                        <h6 class="lead">
                            by <a href="post_view.php?photo_id=<?php echo $photo->photo_id; ?>"><?php echo $photo->author ?></a>
                        </h6>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Pager -->
             <ul class="pager">
                <?php
                    // Show previous button if not on the first page.
                    if ($paginator->has_previous()) {
                        echo "<li><a href='index.php?page=" . $paginator->previous() . "'>&laquo; Previous</a></li>";
                    }

                    // Set how many adjacent pages should be shown on each side of the current page
                    $range = 2;
                    $start = ($page - $range > 1) ? $page - $range : 1;
                    $end = ($page + $range < $paginator->page_total()) ? $page + $range : $paginator->page_total();

                    for ($i = $start; $i <= $end; $i++) {
                        $class = ($i == $page) ? 'active' : '';  // Current page or not
                        echo "<li><a href='index.php?page={$i}' class='{$class}'>{$i}</a></li>";
                    }

                    // Show next button if not on the last page
                    if ($paginator->has_next()) {
                        echo "<li><a href='index.php?page=" . $paginator->next() . "'>Next &raquo;</a></li>";
                    }
                ?>
             </ul>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">
            <?php include "includes/sidebar.php" ?>
        </div>

    </div>
    <!-- /.row -->

    <hr>
    <?php include "includes/footer.php" ?>
</div>
