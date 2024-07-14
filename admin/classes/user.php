<?php

class User{

    public static function find_all_user(){
        global $database;
        
        $sql = "SELECT * FROM users";
        $result = $database->query($sql);
        return $result;
    }












}

















?>