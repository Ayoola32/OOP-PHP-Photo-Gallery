<?php

class Db_object{
    
    // method to find all users
    public static function find_all_user(){

        return static::find_query("SELECT * FROM " . static::$db_table);
    }


    // method use to find a single user by its user_id
    public static function find_user_id($user_id) {
        $result = static::find_query("SELECT * FROM " . static::$db_table . " WHERE user_id = '{$user_id}' LIMIT 1");
        return !empty($result) ? array_shift($result) : null;  // Ternary operator in replacement of if statement
    } 


    // method used when writing a query
    public static function find_query($sql){
        global $database;
        $result = $database->query($sql);
        $obj_array = array();

        while ($row = mysqli_fetch_array($result)) {
            $obj_array[] = static::instantiate($row);
        }
        return $obj_array;
    }


    
    // instantiation of the properties also called variables
    public static function instantiate($record){
        $calling_class = get_called_class();
        $obj = new $calling_class;

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
        foreach (static::$db_table_field as $db_field) {
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

        $sql = "INSERT INTO " . static::$db_table . "(" . implode(",", array_keys($properties)) . ")";
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



        $sql  = "UPDATE " . static::$db_table . " SET ";
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
        $sql = "DELETE FROM " . static::$db_table . " ";
        $sql .= "WHERE user_id = " . $database->escape_string($this->user_id);
        $sql .= " LIMIT 1";
        
        $database->query($sql);
        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }

    




}












?>