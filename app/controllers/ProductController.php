<?php

namespace App\Controllers;

use App\Classes\CSRFToken;
use App\classes\FileUpload;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Session;
use App\classes\ValidateRequest;
use App\models\Category;
use App\models\Product;
use App\models\SubCategory;

class ProductController extends BaseController
{
    public function index()
    {
        return view('admin.product.index');
    }
    public function create()
    {
        $cats = Category::all();
        $subcats = SubCategory::all();
        return view('admin/product/create', compact('cats', 'subcats'));
    }
    public function store()
    {
        $request = Request::get('key_post');
        $file = Request::get('key_file');
        // Session::remove('token');
        if (CSRFToken::checkToken($request->_token)) {
            $rules = [
                "name" => ["minLength" => "3", "required" => true],
                "cat_id" => ["required" => true],
                "sub_cat_id" => ["required" => true],
                "price" => ["number" => true, "required" => true],
                "file" => ["required" => true],
                "quantity" => ["number" => true, "required" => true],
                "description" => ["minLength" => "10", "required" => true],
            ];

            $data = (object)array_merge((array)$request, (array)$file); // combine two obj as a array and this change a object
            $validator = new ValidateRequest();
            $validator->checkValidate($data, $rules);
            if ($validator->hasError()) {
                Session::put('errors', $validator->getError());
                Redirect::back();
            } else {
                $uploadFile = new FileUpload();
                if ($uploadFile->move($file)) {
                     $image = $uploadFile->getPath();
                     $product = Product::create([
                        "name"=>escape($request->name),
                        "cat_id"=>$request->cat_id,
                        "sub_cat_id"=>$request->sub_cat_id,
                        "price"=>$request->price,
                        "image"=>$image,
                        "quantity"=>$request->quantity,
                        "description"=>escape($request->description),
                     ]);
                     if($product){
                        Redirect::to('/admin/product',['ok','product created']);
                     }else{
                        Session::flash('error', 'Product create fail', 'danger');
                        Redirect::back();
                     }
                }else{
                    Session::flash('error',$uploadFile->move($file),'danger');
                    Redirect::back();
                }
            }
        } else {
            Session::flash('error', 'CSRF attack occur', 'danger');
            Redirect::back();
        }
    }
}