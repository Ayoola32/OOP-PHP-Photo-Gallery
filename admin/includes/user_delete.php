<?php include "../admin/classes/init.php"; ?>

<?php
if (empty($_GET['user_id'])) {
    header("Location: ../admin/users.php"); 
    exit(); 
}


$user = User::find_by_id($_GET['user_id']);
if ($user) {
    $user->delete_user();  
    header("Location: ./users.php"); 
    exit();
} else {
    header("Location: ./users.php"); 
    exit();
}





?>