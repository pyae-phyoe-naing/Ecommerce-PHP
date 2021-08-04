<?php

namespace App\Classes;

class Request
{
    public static function all($is_array = false)  // default return Object => false = Object , true = Array
    {
        $result = [];
        if (count($_GET) > 0) $result['key_get'] = $_GET;
        if (count($_POST) > 0) $result['key_post'] = $_POST;
        $result['key_file'] = $_FILES;

        return json_decode(json_encode($result), $is_array);
    }
    public static function get($key)
    {
        // return self::all(true)[$key]; // as array argument true send
        return self::all()->$key; // as object default
    }
    public static function has($key)
    {
        // return isset(self::all()->$key) ? true : false;
        return array_key_exists($key, self::all(true)) ? true : false;
    }
    public static function old($key, $value)  // next before GET or POST method get old value
    {
        return isset(self::all()->$key->$value) ? self::all()->$key->$value : '';
        // eg: check $result['key_post'] ['name']  => $key = ['key_post'] , $value = ['name']
    }
    public function refresh(){
        $_POST = [];
        $_GET = [];
        $_FILES = [];
    }
}
