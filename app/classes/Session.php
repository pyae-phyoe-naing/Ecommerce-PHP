<?php

namespace App\Classes;
class Session
{
    public static function put($key, $value)
    {
        if (!self::has($key)) {
            $_SESSION[$key] = $value;
        } else {
            echo 'Session with that KEY - [ ' . $key . ' ] already define!';
        }
    }
    public static function has($key)
    {
        return isset($_SESSION[$key]) ? true : false;
    }
    public static function get($key)
    {
        if (self::has($key)) {
            return $_SESSION[$key];
        } else {
            return null;
        }
    }
    public static function remove($key)
    {
        if (self::has($key)) {
            unset($_SESSION[$key]);
        }
    }
    public static function replace($key, $value)
    {
        if (self::has($key)) {
            self::remove($key);
        }
        self::put($key, $value);
    }

    public static function flash($key,$value='',$color='success'){
        if(!empty($value)){
           self::replace($key,$value);
        }else{
            if(self::has($key))
            echo "
            <div class='alert alert-$color alert-dismissible fade show' role='alert'>
            ".self::get($key)."
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
            </div>";
            self::remove($key);
        }
    }

    public static function error($key){
        if(self::has('errors')){
            echo self::get('errors')[$key] ?? '';
        }
    }

    public static function toast($key){
        if(self::has($key)){
            echo self::get($key);
            self::remove($key);
        }
    }

}
