<?php

class User{
    public $user_id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $user_email;


    // method to find all users
    public static function find_all_user(){

        return self::find_query("SELECT * FROM users");
    }


    // method use to find a single user by its user_id
    public static function find_user_id($user_id) {
        $result = self::find_query("SELECT * FROM users WHERE user_id = '{$user_id}' LIMIT 1");
        return !empty($result) ? array_shift($result) : null;  // tenaryr opertaor irreplacement of if statment 

    }


    // method used when writing a query
    public static function find_query($sql){
        global $database;
        $result = $database->query($sql);
        $obj_array = array();

        while ($row = mysqli_fetch_array($result)) {
            $obj_array[] = self::instantiate($row);
        }
        return $obj_array;
    }


    // instantiation of the properties also called variables
    public static function instantiate($record){
        $obj = new self;

        // $obj->user_id = $found_user['user_id'];
        // $obj->username = $found_user['username'];
        // $obj->password = $found_user['password'];
        // $obj->first_name = $found_user['first_name'];
        // $obj->last_name = $found_user['last_name'];
        // $obj->user_email = $found_user['user_email'];

        foreach ($record as $attribute => $value) {

            if ($obj->has_attribute($attribute)) {
                $obj->$attribute = $value;
            }
        }

        return $obj;

    }

    
    // method to find the attribute
    private function has_attribute($attribute){
        $obj_properties = get_object_vars($this);

        return array_key_exists($attribute, $obj_properties);
    }












}

















?>