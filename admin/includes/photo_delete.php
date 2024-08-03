<?php include "../classes/init.php"; ?>

<?php
if (empty($_GET['photo_id'])) {
    header("Location: ../photos.php"); 
    exit(); 
}


$photo = Photo::find_by_id($_GET['photo_id']);
if ($photo) {
    $photo->delete_photo();  
    header("Location: ../photos.php"); 
    exit();
} else {
    header("Location: ../photos.php"); 
    exit();
}





?>