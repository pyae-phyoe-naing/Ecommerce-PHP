<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model{
    protected $fillable = ['name','price','cat_id','sub_cat_id','image','featured','quantity','description'];
}