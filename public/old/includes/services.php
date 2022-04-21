<?php

class Services extends Db_object{
    protected static $db_table = "services";
    protected static $db_table_fields = array('title', 'icon', 'color', 'content');
    public $id;
    public $title;
    public $icon;
    public $color;
    public $content;
}