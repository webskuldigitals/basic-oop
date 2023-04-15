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

    
    /**
     * @param array<mixed> $array
     * @return array<mixed>
     */
    public static function groupArrayByKey(array $array, string $key) : array
    {
        $return = array();
        foreach ($array as $val) {
            $return[$val[$key]][] = $val;
        }
        return $return;
    }

}