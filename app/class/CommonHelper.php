<?php

class CommonHelper
{
    public static $conn;

    public static function setDb(PDO $conn) : void
    {
        self::$conn = $conn;
    }

    public static function db() : PDO
    {
        return self::$conn;
    }
}