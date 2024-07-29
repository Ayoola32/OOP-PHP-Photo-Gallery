<?php

class User extends Db_object {
    private static $db_table = "users";
    private static $db_table_field = array('username', 'password', 'first_name', 'last_name', 'user_email');
    public $user_id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $user_email;



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


    // Escape properties
    protected function clean_properties(){
        global $database;

        $clean_properties = array();

        foreach ($this->properties() as $key => $value) {
            $clean_properties[$key] = $database->escape_string($value);
        }
        return $clean_properties;
    }







    // // // // // //
    // CRUD METHODS
    // // // // // //


    // CREATE
    public function create(){
        global $database;
        $properties = $this->clean_properties();

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
        $properties = $this->clean_properties();
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