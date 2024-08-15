<?php include "../admin/classes/init.php"; ?>

<?php
if (isset($_GET['comment_id'])) {
    $comment = Comment::find_by_id($_GET['comment_id']);
    if ($comment) {
        $comment->delete();
        
        if (isset($_GET['photo_id'])) {
            header("Location: ../admin/photos.php?source=photo_comment&photo_id=" . $_GET['photo_id']); 
        } else {
            header("Location: ../admin/comments.php"); 
        }
        exit();
    } else {
        if (isset($_GET['photo_id'])) {
            header("Location: ../admin/photos.php?source=photo_comment&photo_id=" . $_GET['photo_id']);
        } else {
            header("Location: ../admin/comments.php");
        }
        exit();
    }
} else {
    if (isset($_GET['photo_id'])) {
        header("Location: ../admin/photos.php?source=photo_comment&photo_id=" . $_GET['photo_id']);
    } else {
        header("Location: ../admin/comments.php");
    }
    exit();
}
?>
