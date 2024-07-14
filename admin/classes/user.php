<?php

class User{

    public function find_all_user(){
        global $database;
        
        $sql = "SELECT * FROM users";
        $result = $database->query($sql);
        return $result;
    }












}

















?>