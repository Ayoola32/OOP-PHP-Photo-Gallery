<?php

class User extends Db_object {
    protected static $db_table = "users";
    protected static $db_table_field = array('username', 'password', 'first_name', 'last_name', 'user_email', 'user_image');
    protected static $db_id_field = "user_id"; // Specify the id field for the User class

    public $user_id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $user_email;
    public $user_image;

    public $upload_directory = "images";
    public $image_placeholder = "https://placehold.it/400x400&text=User image";
    public $tmp_path;

    public function image_path_placeholder(){
        return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory . DS . $this->user_image;
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






}

















?>