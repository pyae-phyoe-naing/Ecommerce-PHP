<?php


namespace App\Controllers;

use App\models\Product;


class IndexController extends BaseController
{
    public  function welcome()
    {
        $total_count = Product::count();
        list($product, $pages) = paginate(12, $total_count, new Product());
        $product = json_decode(json_encode($product));
        $carousel = Product::orderBy('id','desc')->get();
        return view('frontend.welcome', compact('product','pages','carousel'));
    }
}
