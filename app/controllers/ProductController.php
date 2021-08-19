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
        $total_count = Product::count();
        list($product, $pages) = paginate(2, $total_count, new Product());
        $product = json_decode(json_encode($product));
        return view('admin.product.index', compact('product', 'pages'));
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
                if (is_bool($uploadFile->move($file))) {
                    $image = $uploadFile->getPath();
                    $product = Product::create([
                        "name" => escape($request->name),
                        "cat_id" => $request->cat_id,
                        "sub_cat_id" => $request->sub_cat_id,
                        "price" => $request->price,
                        "image" => $image,
                        "quantity" => $request->quantity,
                        "description" => escape($request->description),
                    ]);
                    if ($product) {
                        Redirect::to('/admin/product', ['ok', 'product created']);
                    } else {
                        Session::flash('error', 'Product create fail', 'danger');
                        Redirect::back();
                    }
                } else {
                    // Session::put('errors',['file'=>$uploadFile->move($file)]); // show like validation type
                    Session::flash('error', $uploadFile->move($file), 'danger');
                    Redirect::back();
                }
            }
        } else {
            Session::flash('error', 'CSRF attack occur', 'danger');
            Redirect::back();
        }
    }
    public function edit($id)
    {
        $cats = Category::all();
        $subcats = SubCategory::all();
        $product = Product::where('id', $id)->first();
        if (is_null($product)) {
            Redirect::to('/admin/product', ['fail', 'product not found']);
        } else {
            return view('admin/product/edit', compact('cats', 'subcats', 'product'));
        }
    }
    public function update($id)
    {
        $oldProduct = Product::findOrFail($id);
        $request = Request::get('key_post');
        $file = Request::get('key_file');
        // Session::remove('token');
        if (CSRFToken::checkToken($request->_token)) {
            $rules = [
                "name" => ["minLength" => "3", "required" => true],
                "cat_id" => ["required" => true],
                "sub_cat_id" => ["required" => true],
                "price" => ["number" => true, "required" => true],
                "quantity" => ["number" => true, "required" => true],
                "description" => ["minLength" => "10", "required" => true],
            ];

            $validator = new ValidateRequest();
            $validator->checkValidate($request, $rules);
            if ($validator->hasError()) {
                Session::put('errors', $validator->getError());
                Redirect::back();
            } else {

                if (!empty($file->file->name)) {
                    $fileUpload = new FileUpload();
                    if (!is_bool($fileUpload->move($file))) {                  
                        Session::put('errors', ['file' => $fileUpload->move($file)]);
                        Redirect::back();
                        die();
                    } else {
                        $del_img = getUploadFolderImage($oldProduct->image);;
                        if (file_exists($del_img)) {
                            unlink($del_img);
                        }
                        $image = $fileUpload->getPath();
                    }
                } else {
                    $image = $oldProduct->image;
                }
                $oldProduct->name = escape($request->name);
                $oldProduct->price = $request->price;
                $oldProduct->cat_id = $request->cat_id;
                $oldProduct->sub_cat_id = $request->sub_cat_id;
                $oldProduct->image = $image;
                $oldProduct->quantity = $request->quantity;
                $oldProduct->description = escape($request->description);
                if ($oldProduct->update()) {
                    Redirect::to('/admin/product', ['ok', 'product updated']);
                } else {
                    Session::put('errors', 'product updated fail');
                    Redirect::back();
                }
            }
        } else {
            Session::flash('error', 'CSRF attack occur', 'danger');
            Redirect::back();
        }
    }

    public function destroy($id)
    {

        $product = Product::where('id', $id);
        if (!is_null($product->first())) {
            $del_img = getUploadFolderImage($product->first()->image);
            if (file_exists($del_img)) {
                unlink($del_img);
            }
            if ($product->delete()) {
                Redirect::to('/admin/product', ['ok', 'product deleted']);
            } else {
                Redirect::to('/admin/product', ['fail', 'product delete fail']);
            }
        } else {
            Redirect::to('/admin/product', ['fail', 'product not found']);
        }
    }
    public function productDeatil($id){
         $product  = Product::find($id);
         if($product){
             $cat = Category::find($product->cat_id);
             $subcat = SubCategory::find($product->sub_cat_id);
             return view('frontend.product_detail',compact('product','cat','subcat'));
         }else{
             Redirect::to('/',['info','Product Not Found']);
         }
    }
}
