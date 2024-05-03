<?php

require_once __DIR__ . '/Database.php';

class Category
{
    public static function createCategory($name)
    {
        $db = new Database;

        $sql = "INSERT INTO `categories` (`name`) VALUES ('$name')";

        $db->makeQuery($sql);
    }
}
