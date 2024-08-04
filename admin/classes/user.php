<?php

class User extends Db_object {
    protected static $db_table = "users";
    protected static $db_table_field = array('username', 'password', 'first_name', 'last_name', 'user_email', 'user_image');
    protected static $db_id_field = "user_id";

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
    public $errors = array();
    public $upload_error = array(
        UPLOAD_ERR_OK => "There is no error",
        UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max filesize directive",
        UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the MAX_FILE_SIZE directive",
        UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded",
        UPLOAD_ERR_NO_FILE => "No file was uploaded",
        UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder",
        UPLOAD_ERR_CANT_WRITE => "Failed to write file to a disk",
        UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload"
    );

    // Method to set default image path if empty
    public function image_path_placeholder() {
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

    // Method to set the image uploaded
    public function set_file($file) {
        if (empty($file) || !$file || !is_array($file)) {
            $this->errors[] = "There was no file uploaded here";
            return false;
        } elseif ($file['error'] != 0) {
            $this->errors[] = $this->upload_error[$file['error']];
            return false;
        } else {
            $this->user_image = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            return true;
        }
    }

    // Method to save both new user and image
    public function save() {
        if (!empty($this->errors)) {
            return false;
        }

        if (empty($this->user_image) || empty($this->tmp_path)) {
            $this->errors[] = "The file was not available";
            return false;
        }

        $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_image;
        
        if (file_exists($target_path)) {
            $this->errors[] = "This User image file {$this->user_image} already exists";
            return false;
        }

        if (move_uploaded_file($this->tmp_path, $target_path)) {
            if ($this->create()) {
                unset($this->tmp_path);
                return true;
            }
        } else {
            $this->errors[] = "The file directory probably does not have permission";
            return false;
        }
    }

    // Method to check if a username or email exists
    public static function username_or_email_exists($username, $email) {
        global $database;
    
        $username = $database->escape_string($username);
        $email = $database->escape_string($email);
    
        $sql = "SELECT * FROM " . self::$db_table . " WHERE ";
        $sql .= "username = '{$username}' OR user_email = '{$email}'";
        
        $result_array = self::find_query($sql);
    
        return !empty($result_array) ? array_shift($result_array) : false;
    }

    // Method to check for empty fields
    public function has_empty_fields() {
        $required_fields = ['first_name', 'last_name', 'username', 'password', 'user_email'];
        foreach ($required_fields as $field) {
            if (empty($this->$field)) {
                return true;
            }
        }
        return false;
    }
    
}


















?>