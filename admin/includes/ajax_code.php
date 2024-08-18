<?php include "../classes/init.php";?>

<?php
if (isset($_POST['image_name']) && isset($_POST['user_id'])) {
    $user = User::find_by_id($_POST['user_id']);
    if ($user) {
        $user->user_image = $_POST['image_name'];
        if ($user->update_user_image()) {
            echo "User image updated successfully.";
        } else {
            echo "Failed to update user image.";
        }
    } else {
        echo "User not found.";
    }
} else {
    echo "Invalid input.";
}
?>
