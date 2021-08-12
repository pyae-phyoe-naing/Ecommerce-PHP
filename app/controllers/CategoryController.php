<?php

namespace App\Controllers;

use App\Classes\Request;
use App\Classes\Session;
use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\classes\ValidateRequest;
use App\models\Category;
class CategoryController extends BaseController
{
    public function index()
    {
        $total_count = Category::count();
        list( $category,$pages) = paginate(2,$total_count,new Category());
        $category = json_decode( json_encode($category));

        return view('admin/category/index', compact('category','pages'));
    }
    public function create()
    {
        return view('admin/category/create');
    }
    public function store()
    {
        $request = Request::get('key_post');
        $token = $request->_token;
        // Session::remove('token');
        if (CSRFToken::checkToken($token)) {
            $rules = [
                "name" => ['minLength' => '3', 'unique' => 'categories', 'required' => true]
            ];
            $validator = new ValidateRequest();
            $validator->checkValidate($request, $rules);
            if ($validator->hasError()) {
                Session::put('errors', $validator->getError());
                Redirect::back();
            } else {
                // $category = new Category();
                // $category->name = $request->name;
                // $category->slug = slug($request->name);
                // $category->save();
                Category::create([
                    "name" => $request->name,
                    "slug" => slug($request->name)
                ]);
                //Session::put('ok', 'create success');
                //Redirect::back();
                $ok = 'create success';
                $category = Category::all();
                return view('admin/category/index', compact('category', 'ok'));
            }
        } else {
            Session::flash('error','CSRF attack occur!');
            Redirect::back();
        }
    }
    public function destroy($id)
    {
        $category = Category::destroy($id);
        if($category){
            Redirect::to('/admin/category',['ok','category delete']);
        }else{
            Redirect::to('/admin/category',['fail','category delete fail']);
        }
    }
}
