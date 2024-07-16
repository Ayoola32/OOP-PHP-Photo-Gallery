<?php

function my_autoload($class) {
    $class = strtolower($class);
    $the_path = "classes/{$class}.php";

    if (file_exists($the_path)) {
        require_once($the_path);
    } else {
        die("<br> This file name <b>{$class}.php </b> cannot be found......");
    }
}


function redirect($location){
    header("Location: {$location}");
}


// Register the autoload function
spl_autoload_register('my_autoload');
?>
