<?php

class Comment extends Db_object {
    protected static $db_table = "comments";
    protected static $db_table_field = array('photo_id', 'author', 'content', 'date');
    protected static $db_id_field = "comment_id"; // Specify the id field for the Comment class

    public $comment_id;
    public $photo_id;
    public $author;
    public $content;
    public $date;

    // Self-instantiation comment method
    public static function create_comment($photo_id, $author, $content){
        if (!empty($photo_id) && !empty($author) && !empty($content)) {
            $comment = new self();
            $comment->photo_id = (int)$photo_id;
            $comment->author   = $author;
            $comment->content  = $content;
            $comment->date     = date('Y-m-d H:i:s');

            return $comment;
        } else {
            return false; 
        }
    }

    public static function find_the_comments($photo_id){
        global $database;

        $sql = "SELECT * FROM " . self::$db_table;
        $sql .= " WHERE photo_id = " . $database->escape_string($photo_id);
        $sql .= " ORDER BY comment_id DESC";

        return self::find_query($sql);
    }
















}

?>
