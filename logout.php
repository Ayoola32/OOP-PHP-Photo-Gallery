<?php require_once "admin/classes/init.php";?>
<?php

$session->logout($user);
redirect("login.php");



?>