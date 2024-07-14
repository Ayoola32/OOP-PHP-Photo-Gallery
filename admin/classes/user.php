<?php

class User{

    public static function find_all_user(){
        global $database;
        
        $sql = "SELECT * FROM users";
        $result = $database->query($sql);
        return $result;
    }

    public static function find_user_id($user_id){
        global $database;

        $sql = "SELECT * FROM users WHERE user_id = '{$user_id}' LIMIT 1";
        $result = $database->query($sql);
        $found_user = mysqli_fetch_array($result);
        return $found_user;
    }












}

















?>