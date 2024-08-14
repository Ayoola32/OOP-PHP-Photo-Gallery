<?php include "../admin/classes/init.php"; ?>

<?php
if (empty($_GET['comment_id'])) {
    header("Location: ../admin/comments.php"); 
    exit(); 
}


$comment = Comment::find_by_id($_GET['comment_id']);
if ($comment) {
    $comment->delete();  
    header("Location: ../admin/comments.php"); 
    exit();
} else {
    header("Location: ../admin/comments.php"); 
    exit();
}





?>