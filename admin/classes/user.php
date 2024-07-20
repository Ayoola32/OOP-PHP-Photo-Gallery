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
        return !empty($result) ? array_shift($result) : null;  // Ternary operator in replacement of if statement
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



    // method used to verify user in login page
    public static function verify_user($username, $password){
        global $database;

        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM users WHERE ";
        $sql .= "username = '{$username}' AND ";
        $sql .= "password = '{$password}' ";
        $sql .= "LIMIT 1";


        $result_array = self::find_query($sql);
        return !empty($result_array) ? array_shift($result_array) : false;
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


    // public function escape_string($string){
    //     $escaped_string = mysqli_real_escape_string($this->connection, $string);
    //     return $escaped_string;
    // }








    // // // // // //
    // CRUD METHODS
    // // // // // //


    // CREATE
    public function create(){
        global $database;
        $sql = "INSERT INTO users (username, `password`, first_name, last_name, user_email) ";
        $sql .= "VALUES ('";
        $sql .= $database->escape_string($this->username) . "', '";
        $sql .= $database->escape_string($this->password) . "', '";
        $sql .= $database->escape_string($this->first_name) . "', '";
        $sql .= $database->escape_string($this->last_name) . "', '";
        $sql .= $database->escape_string($this->user_email) . "')";

        if ($database->query($sql)) {
            $this->id = $database->the_insert_id();
            return true;
        } else {
            return false;
        }

    }


    // UPDATE
    public function update(){
        global $database;
        $sql  = "UPDATE users SET ";
        $sql .= "username= '" . $database->escape_string($this->username) . "', ";
        $sql .= "password= '" . $database->escape_string($this->password) . "', ";
        $sql .= "first_name= '" . $database->escape_string($this->first_name) . "', ";
        $sql .= "last_name= '" . $database->escape_string($this->last_name) . "', ";
        $sql .= "user_email= '" . $database->escape_string($this->user_email) . "' ";
        $sql .= " WHERE user_id = " . $database->escape_string($this->user_id);

        $database->query($sql);
        return (mysqli_affected_rows($database->connection) == 1) ? true : false;



    }




}

















?>