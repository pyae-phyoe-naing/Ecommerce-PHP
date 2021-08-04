<?php

namespace App\Controllers;

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
        beautify($_POST);
    }
}
