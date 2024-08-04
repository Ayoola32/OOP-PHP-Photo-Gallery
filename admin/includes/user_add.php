<?php

$message = "";
if (isset($_POST["submit"])) {
    $user = new User();
    $user->first_name = $_POST['firstname'];
    $user->last_name = $_POST['lastname'];
    $user->username = $_POST['username'];
    $user->password = $_POST['password'];
    $user->user_email = $_POST['email'];
    $user->set_file($_FILES['user_image']);

    if ($user->has_empty_fields()) {
        $message = "<p class='alert alert-danger'>All fields are required.</p>";
    } else {
        $existing_user = User::username_or_email_exists($user->username, $user->user_email);
        
        if ($existing_user) {
            $message = "<p class='alert alert-danger'>Username or Email has already been taken.</p>";
        } else {
            // Save the new user
            if ($user->save()) {
                $message = "<p class='alert alert-success'>User created successfully.</p>";
            } else {
                $message = "<p class='alert alert-danger'>Failed to create user.  " . implode("<br>", $user->errors) . "</p>";
            }
        }
    }


}

?>





<div class="col-md-4">
    <?php echo $message; ?>
    <form action="" method="post" enctype="multipart/form-data">
        <h2>Add New User</h2>
        
    <div class="form-group">
        <label for="firstname">Firstname</label>
        <input type="text" class="form-control" name="firstname">
    </div>

    <div class="form-group">
        <label for="lastname">Lastname</label>
        <input type="text" class="form-control" name="lastname">
    </div>

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password">
    </div>

    <div class="form-group">
        <label for="user_image">User Image</label>
        <input type="file" name="user_image">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="submit" value="Add User">
    </div>
    </form>
</div>
