<?php

class Comment_reply extends DbObject
{
    protected static $db_table = "comment_replies";
    protected static $db_fields = array('comment_id', 'author', 'body');

    public $id;
    public $comment_id;
    public $author;
    public $body;

    public static function find_the_comment_replies($id) {
        $id = (int)$id;
        return static::find_this_query("SELECT * FROM comment_replies WHERE comment_id = $id");
    }
}