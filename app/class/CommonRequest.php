<?php

class CommonRequest {
    public static function getPost($var)
    {
        if(!empty($var) && isset($_POST[$var])){
            return $_POST[$var];
        }else{
            return $_POST;
        }
    }
    public static function getQueryString($var = '')
    {
        if(!empty($var) && isset($_GET[$var])){
            return $_GET[$var];
        }else{
            return $_GET;
        }
    }
}