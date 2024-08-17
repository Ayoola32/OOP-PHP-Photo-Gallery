<?php $photos = Photo::find_all(); ?>

<table class="table  hovered table-hover table-striped">
    <thead>
        <tr>
            <th>Photo</th>
            <th>Id</th>
            <th>Title</th>
            <th>Author</th>
            <th>Filename</th>
            <th>Size</th>
            <th>Comments</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($photos as $photo) : ?>
            <?php $comments = Comment::find_the_comments($photo->photo_id);?>
            <tr>
                <td>
                    <img src="<?php echo $photo->picture_path(); ?>" alt="" style="width: 200px; height: auto;">
                    <div class="picture_link">
                        <a class='btn-warning' href='../post_view.php?photo_id=<?php echo $photo->photo_id?>'>View</a>
                        <a class='btn-info mr-2' href='photos.php?source=photo_update&photo_id=<?php echo $photo->photo_id;?>'>Edit</a>
                        <a class='btn-danger' href='photos.php/?source=photo_delete&photo_id=<?php echo $photo->photo_id;?>'>Delete</a>
                    </div>
                </td>
                <td><?php echo $photo->photo_id?></td>
                <td><?php echo $photo->title?></td>
                <td><?php echo $photo->author?></td>
                <td><?php echo $photo->filename?></td>
                <td><?php echo $photo->size?></td>
                <td><a class='btn btn-warning' href="photos.php?source=photo_comment&photo_id=<?php echo $photo->photo_id ?>"><?php echo count($comments)?> comments</a></td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table> 