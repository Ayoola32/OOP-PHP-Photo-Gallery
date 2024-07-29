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




}












?>