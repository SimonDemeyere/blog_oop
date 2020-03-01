<?php

class Post extends DbObject
{

    /*general variabelen*/
    protected static $db_table = "posts";
    protected static $db_fields = array('title', 'description', 'short_description');
    public $id;
    public $title;
    public $description;
    public $short_description;

    /**methodes**/




}