<?php

namespace App\Controllers;

use App\Classes\Request;

class CategoryController extends BaseController
{
    public function index()
    {
        return view('admin/category/index');
    }
    public function create()
    {
        return view('admin/category/create');
    }
    public function store(){
       // beautify(Request::all(true)); // array
       // beautify(Request::all());  // object
      // beautify(Request::get('key_post'));
     // dd(Request::has('key_get'));
     // dd(Request::has('key_post'));
      beautify(Request::refresh());
      beautify(Request::old('key_file', 'image'));
      beautify(Request::old('key_post', 'name'));
    }
}
