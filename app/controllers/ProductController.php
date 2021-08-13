<?php

namespace App\Controllers;

use App\models\Category;
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
        return view('admin/product/create',compact('cats','subcats'));
    }
}
