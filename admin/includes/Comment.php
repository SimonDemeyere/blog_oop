<?php

class Comment extends DbObject
{
    protected static $db_table = "comments";
    protected static $db_fields = array('photo_id', 'author', 'body');

    public $id;
    public $photo_id;
    public $author;
    public $body;

    public static function create_comment($photo_id, $author="test", $body="") {
        if (!empty($photo_id) && !empty($author) && !empty($body)) {
            $comment = new Comment();
            $comment->photo_id = (int)$photo_id;
            $comment->author = $author;
            $comment->body = $body;
            return $comment;
        } else {
            return false;
        }
    }
    public static function find_the_comments($id) {
        $id = (int)$id;
        return static::find_this_query("SELECT * FROM comments WHERE photo_id = $id");
    }
}