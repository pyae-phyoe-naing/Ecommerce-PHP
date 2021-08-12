<?php

namespace App\Classes;

use App\Classes\Session;

class CSRFToken
{
    public static function _token()
    {
        if (!Session::has('token')) {
            Session::put('token', base64_encode(openssl_random_pseudo_bytes(32)));
        }else{
            echo Session::get('token');
        }
    }
    public static function checkToken($token)
    {
        return Session::get('token') === $token;
    }
}
