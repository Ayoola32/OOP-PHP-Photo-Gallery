<?php

class User{
    private static $db_table = "users";
    private static $db_table_field = array('username', 'password', 'first_name', 'last_name', 'user_email');
    public $user_id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $user_email;


    // method to find all users
    public static function find_all_user(){

        return self::find_query("SELECT * FROM " . self::$db_table);
    }


    // method use to find a single user by its user_id
    public static function find_user_id($user_id) {
        $result = self::find_query("SELECT * FROM " . self::$db_table . " WHERE user_id = '{$user_id}' LIMIT 1");
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

        $sql = "SELECT * FROM " . self::$db_table . " WHERE ";
        $sql .= "username = '{$username}' AND ";
        $sql .= "password = '{$password}' ";
        $sql .= "LIMIT 1";


        $result_array = self::find_query($sql);
        return !empty($result_array) ? array_shift($result_array) : false;
    }



    // instantiation of the properties also called variables
    public static function instantiate($record){
        $obj = new self;

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


    // Properties of the table
    protected function properties(){

        $properties = array();
        foreach (self::$db_table_field as $db_field) {
            if (property_exists($this, $db_field)) {
                $properties[$db_field] = $this->$db_field;
            }
        }
        

        return $properties;
    }








    // // // // // //
    // CRUD METHODS
    // // // // // //


    // CREATE
    public function create(){
        global $database;
        $properties = $this->properties();

        $sql = "INSERT INTO " . self::$db_table . "(" . implode(",", array_keys($properties)) . ")";
        $sql .= "VALUES ('" . implode("','", array_values($properties)) . "')";

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
        $properties = $this->properties();
        $properties_pairs = array();
        foreach ($properties as $key => $value) {
            $properties_pairs[] = "{$key}='{$value}'";
        }



        $sql  = "UPDATE " . self::$db_table . " SET ";
        $sql .= implode(", ", $properties_pairs);
        // $sql .= "username= '" . $database->escape_string($this->username) . "', ";
        // $sql .= "password= '" . $database->escape_string($this->password) . "', ";
        // $sql .= "first_name= '" . $database->escape_string($this->first_name) . "', ";
        // $sql .= "last_name= '" . $database->escape_string($this->last_name) . "', ";
        // $sql .= "user_email= '" . $database->escape_string($this->user_email) . "' ";
        $sql .= " WHERE user_id = " . $database->escape_string($this->user_id);

        $database->query($sql);
        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
        
        
        
    }
    
    
    // DELETE
    public function delete(){
        global $database;
        $sql = "DELETE FROM " . self::$db_table . " ";
        $sql .= "WHERE user_id = " . $database->escape_string($this->user_id);
        $sql .= " LIMIT 1";
        
        $database->query($sql);
        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }




}

















?>