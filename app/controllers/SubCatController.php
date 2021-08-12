<?php

namespace App\Controllers;

use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Classes\Session;
use App\classes\ValidateRequest;
use App\models\SubCategory;

class SubCatController extends BaseController
{
    public function index()
    {
        $total_count = SubCategory::count();
        list($category, $pages) = paginate(5, $total_count, new SubCategory());
        $category = json_decode(json_encode($category));
        return view('admin/subcat/index', compact('category', 'pages'));
    }
    public function store()
    {
        $request = Request::get('key_post');
        //  Session::remove('token');
        if (CSRFToken::checkToken($request->token)) {
            $rules = [
                "name" => ['minLength' => '3', 'required' => true]
            ];
            $validator = new ValidateRequest();
            $validator->checkValidate($request, $rules);
            if ($validator->hasError()) {
                $data = [
                    'validate' => false,
                    'message' => $validator->getError()
                ];
                echo json_encode($data);
                exit;
            } else {
                $subcat = SubCategory::create([
                    'name' => $request->name,
                    'cat_id' => $request->cat_id
                ]);
                if ($subcat) {
                    Session::put('ok', 'subcat create');
                    $data = [
                        'success' => true
                    ];
                    echo json_encode($data);
                    exit;
                }else{
                    $data = [
                        'success' => false,
                        'message' => 'subcat create fail',
                    ];
                    echo json_encode($data);
                    exit;
                }
            }
        } else {
            $data = [
                'success' => false,
                'message' => 'CSRF attack occur',
            ];
            echo json_encode($data);
            exit;
        }
    }

    public function update($id){
        $request = Request::get('key_post');
        // Session::remove('token');
        if(CSRFToken::checkToken($request->token)){
            $subcat = SubCategory::where('id',$id)->update([
                'name'=> $request->name
            ]);
          //  $subcat = false;  // test subcat create fail process
            if($subcat){
                Session::put('ok','subcat update');
                $data = [
                    'success' => true,
                    'message'=>'subcat update!'
                ];
                echo json_encode($data);
                exit;
            }else{
                $data = [
                    'success' => false,
                    'message'=>'subcat create fail'
                ];
                echo json_encode($data);
                exit;
            }
        }else{
            $data = [
                'success' => false,
                'message'=>'CSRF attrack occur!'
            ];
            echo json_encode($data);
            exit;
        }
    }
}
