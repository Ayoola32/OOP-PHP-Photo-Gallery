<?php

if (empty($_GET['user_id'])) {
    redirect("../admin/users.php");
} else {
    $user = User::find_by_id($_GET['user_id']);
    $message = "";

    if (isset($_POST['update'])) {
        if ($user) {
            $user->first_name = $_POST['firstname'];
            $user->last_name = $_POST['lastname'];
            $user->username = $_POST['username'];
            $user->password = $_POST['password'];
            $user->user_email = $_POST['email'];

            if ($user->has_empty_fields()) {
                $message = "<p class='alert alert-danger'>All fields are required.</p>";
            } else {
                $existing_user = User::username_or_email_exists($user->username, $user->user_email);

                if ($existing_user && $existing_user->user_id != $user->user_id) {
                    $message = "<p class='alert alert-danger'>Username or Email has already been taken by another user.</p>";
                } else {
                    // Handle image upload if a new one is provided
                    if (isset($_FILES['user_image']) && $_FILES['user_image']['error'] == UPLOAD_ERR_OK) {
                        $user->set_file($_FILES['user_image']);
                        if (!$user->save_image()) { // Save the new image
                            $message = "<p class='alert alert-danger'>Failed to upload new image. " . implode("<br>", $user->errors) . "</p>";
                        }
                    }

                    if ($user->update()) {
                        $message = "<p class='alert alert-success'>User updated successfully.</p>";
                    } else {
                        $message = "<p class='alert alert-danger'>Failed to update user. " . implode("<br>", $user->errors) . "</p>";
                    }
                }
            }
        }
    }
}
?>


<div class="col-md-6">
    <?php echo $message; ?>
    <form action="" method="post" enctype="multipart/form-data">
        <h2>Update User</h2>
        
        <div class="form-group">
            <label for="firstname">Firstname</label>
            <input type="text" class="form-control" name="firstname" value="<?php echo $user->first_name; ?>">
        </div>
        
        <div class="form-group">
            <label for="lastname">Lastname</label>
            <input type="text" class="form-control" name="lastname" value="<?php echo $user->last_name; ?>">
        </div>
        
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo $user->username; ?>">
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo $user->user_email; ?>">
        </div>
        
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" value="<?php echo $user->password; ?>">
        </div>
        
        
        <div class="form-group">
            <input type="file" name="user_image">
        </div>
        
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="update" value="Update User">
        </div>
    </form>
</div>

<div class="col-md-6">
    <a href="#" data-toggle="modal" data-target="#photo_library"><img width="650" src="../admin/images/<?php echo $user->user_image ?>" alt="User_image"></a>
</div>

<?php include "user_photo_library_modal.php" ?>
