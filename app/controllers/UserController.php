<?php

namespace App\Controllers;

use App\Classes\Auth;
use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Session;
use App\classes\ValidateRequest;
use App\models\User;

class UserController extends BaseController
{
    public function showLogin()
    {
        if(Auth::check()){
            Redirect::to('/',['info','Already Login']);
        }else{
            return view('frontend.user_login');

        }
    }
    public function login()
    {
        $request = Request::get('key_post');
        // Session::remove('token');
        if (CSRFToken::checkToken($request->_token)) {

            $rule = [
                "email" => ["email" => true, "required" => true],
                "password" => ["minLength" => "8", "required" => true]
            ];
            $validator = new ValidateRequest();
            $validator->checkValidate($request, $rule);
            if ($validator->hasError()) {
                Session::put('errors', $validator->getError());
                Redirect::back();
            } else {
                $user = User::where('email', $request->email)->first();
                if ($user) {
                    if (password_verify($request->password, $user->password)) {
                        Session::put('userId',$user->id);
                        Redirect::to('/', ['ok', 'Welcome '.$user->name]);
                    } else {
                        Session::put('errors', ["password" => "password field is incorrect"]);
                        Redirect::back();
                    }
                } else {
                    Session::put('errors', ["email" => "email field is incorrect"]);
                    Redirect::back();
                }
            }
        }
    }
    public function showRegister()
    {
        if(Auth::check()){
            Redirect::to('/',['info','Already Login']);
        }else{
            return view('frontend.user_register');
        }
    }
    public function register()
    {
        $request = Request::get('key_post');
        // Session::remove('token');
        if (CSRFToken::checkToken($request->_token)) {

            $rule = [
                "name" => ["minLength" => "3", "maxLength" => "25", "required" => true],
                "email" => ["unique" => "users", "required" => true],
                "password" => ["minLength" => "8", "maxLength" => "20", "required" => true],
                "confirm_password" => ["minLength" => "8", "maxLength" => "11", "required" => true],
            ];
            $validator = new ValidateRequest();
            $validator->checkValidate($request, $rule);
            if ($validator->hasError()) {
                Session::put('errors', $validator->getError());
                Redirect::back();
            } else {
                if ($request->password !== $request->confirm_password) {
                    Session::put('errors', ["password" => "passwords are do not match"]);
                    Redirect::back();
                } else {
                    $user = new User();
                    $user->name = escape($request->name);
                    $user->email = $request->email;
                    $user->password = password_hash($request->password, PASSWORD_BCRYPT);
                    $user->save();
                    if ($user) {
                        Redirect::to('/user/login', ['success', 'Register success ,Login now !']);
                    } else {
                        Redirect::to('/user/login', ['error', 'Register fail ,try again !']);
                    }
                }
            }
        } else {
            Session::put('fail', 'CSRF Attrack Occur');
            Redirect::back();
        }
    }
    public function logout(){
        Session::remove('userId');
        Redirect::to('/user/login');
    }
}
