<?php

namespace App\Classes;

use App\models\User;

class Auth
{
    public static function check()
    {
        return Session::has('userId');
    }
    public static function user()
    {
        $id = Session::get('userId');
        return self::check() ? User::where('id',$id)->first() : 'no user';
    }
}
