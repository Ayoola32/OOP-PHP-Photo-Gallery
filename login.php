<?php  include "includes/header.php"; ?>
<?php require_once "admin/classes/init.php"; ?>

<?php
if ($session->is_signed_in()) {
	redirect("admin/index.php");
}

if (isset($_POST['submit'])) {
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);


	// Method to check database user
	$user_found = User::verify_user($username, $password);

	if ($user_found) {
		$session->login($user_found);
		redirect("admin/index.php");
	}else {
		$the_message = "Username or Password are incorrect";
	}


}else {
	$the_message = "";
	$username = "";
	$password = "";
}


?>



<!-- Navigation -->

<?php  include "includes/navigation.php"; ?>


<!-- Page Content -->
<div class="container">

	<div class="form-gap"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="text-center">
							<h2 class="text-center">Login</h2>

							<div class="panel-body">
								<h4 class="bg-danger"><?php echo $the_message;?></h4>
								<form action="" id="login-form" role="form" autocomplete="off" class="form" method="post">

									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>

											<input name="username" type="text" class="form-control" value="<?php echo htmlentities($username);?>" placeholder="Enter Username">
										</div>
									</div>

									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
											<input name="password" type="password" class="form-control" value="<?php echo htmlentities($password);?>" placeholder="Enter Password">
										</div>
									</div>

									<div class="form-group">

										<input name="submit" class="btn btn-lg btn-primary btn-block" value="Login" type="submit">
									</div>

									<div class="form-group">
										<a href="forgot_password.php?forgot=<?php echo uniqid(true) ?>" class="text-center">Forgot Password</a>
									</div>
								</form>

							</div><!-- Body-->

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<hr>

	<?php include "includes/footer.php";?>

</div> <!-- /.container -->
