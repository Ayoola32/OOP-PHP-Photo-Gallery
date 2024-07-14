<?php

class User{

    public static function find_all_user(){

        return self::find_query("SELECT * FROM users");
    }

    public static function find_user_id($user_id){
        
        $result = self::find_query("SELECT * FROM users WHERE user_id = '{$user_id}' LIMIT 1");
        $found_user = mysqli_fetch_array($result);
        return $found_user;
    }

    public static function find_query($sql){
        global $database;
        $result = $database->query($sql);
        return $result;
    }












}

















?>