<?php

namespace App\models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as Capsule;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'cat_id', 'sub_cat_id', 'image', 'featured', 'quantity', 'description'];

    public function genPaginate($limit,$search_key='')
    {
       $dataArr = [];
       $table = $this->getTable();
       if($search_key !== ''){
         $data = Capsule::select("SELECT * FROM $table WHERE name LIKE '%$search_key%' ORDER BY id DESC" . $limit);
       }else{
         $data = Capsule::select("SELECT * FROM $table  ORDER BY id DESC" . $limit);
       }
       foreach ($data as $val) {
          $date = new Carbon($val->created_at);
          $cat = Category::where('id',$val->cat_id)->first();
          $subcat = SubCategory::where('id',$val->sub_cat_id)->first();
          array_push($dataArr, [
             'id' => $val->id,
             'name' => $val->name,
             'cat_id' => $val->cat_id,
             'sub_cat_id' => $val->sub_cat_id,
             'price' => $val->price,
             'image' => $val->image,
             'quantity' => $val->quantity,
             'description' => $val->description,
             'format_date' => $date->toFormattedDateString(),
             'created_at' => $val->created_at,
             'cat'=>$cat,
             'subcat'=>$subcat,
          ]);
       }
       return $dataArr;
    }
}
