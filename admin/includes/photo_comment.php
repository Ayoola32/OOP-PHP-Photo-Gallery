<?php 

if (empty($_GET['photo_id']) ) {
    redirect('./photos.php');
}

$comments = Comment::find_the_comments($_GET['photo_id']);

?>

<table class="table  hovered table-hover table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Photo Id</th>
            <th>Author</th>
            <th>Content</th>
            <th>Date</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($comments as $comment) : ?>
            <tr>
                <td><?php echo $comment->comment_id?></td>
                <td><?php echo $comment->photo_id?></td>
                <td><?php echo $comment->author?></td>
                <td><?php echo $comment->content?></td>
                <td><?php echo date('F d, Y \a\t g:i A', strtotime($comment->date));?></td>
                <td>
                    <div class="picture_link">
                        <a class='btn-danger' href='comments.php?source=comment_delete&comment_id=<?php echo $comment->comment_id;?>'>Delete</a>
                    </div>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table> 