<?php

class Photo extends Db_object {
    protected static $db_table = "photos";
    protected static $db_table_field = array('title', 'description', 'filename', 'type', 'size');
    public $photo_id;
    public $title;
    public $description;
    public $filename;
    public $type;
    public $size;

    public $tmp_path;
    public $upload_directory = "images";
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



    // This is passing $_FILES['uploaded_file'] as an arg
    public function set_file($file){

        if (empty($file) || !$file || !is_array($file)) {
            $this->errors[] = "There was no file uploaded here";
            return false;
        }elseif ($file['error'] != 0 ) {
            $this->errors[] = $this->upload_error[$file['error']];
            return false;
        }else{
            $this->filename = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type = $file['type'];
            $this->size = $file['size'];
        }
    }


    public function save(){
        if ($this->photo_id) {
            $this->update();
        }else {
            if (!empty($this->errors)) {
                return false;
            }

            if (empty($this->filename) || empty($this->tmp_path)) {
                $this->errors[] = "The file was not available";
                return false;
            }

            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->filename;
            
            if (file_exists($target_path)) {
                $this->errors[] = "The file {$this->filename} already exist";
                return false;
            }

            if (move_uploaded_file($this->tmp_path, $target_path)) {
                if ($this->create()) {
                    unset($this->tmp_path);
                    return true;
                }
            }else {
                $this->errors[] = "The file directory probably does not have permission";
                return false;
            }
            // $this->create();
        }
    }









}





?>