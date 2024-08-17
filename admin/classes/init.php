<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
define('SITE_ROOT', DS . 'Applications' . DS . 'Xampp' . DS . 'xamppfiles' . DS . 'htdocs' . DS . 'OOP-PHP-Photo-Gallery');
defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT . DS . 'admin' . DS . 'classes');





require_once "function.php";
require_once "new_config.php";
require_once "db.php";
require_once "db_object.php";
require_once "photo.php";
require_once "user.php";
require_once "session.php";
require_once "comment.php";
require_once "pagination.php";



?>