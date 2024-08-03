<?php include "../classes/init.php"; ?>
<?php
if (!$session->is_signed_in()) {
    redirect("../../index.php");
}
?>

<?php
if (empty($_GET['photo_id'])) {
    header("Location: ../../photos.php");
    exit(); 
}


$photo = Photo::find_by_id($_GET['photo_id']);
if ($photo) {
    $photo->delete();
    header("Location: ../../photos.php");
    exit();
} else {
    redirect("../../photos.php");
}
?>





?>