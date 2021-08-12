<?php
namespace App\models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as Capsule;

class SubCategory extends Model{
    protected $fillable = ['name', 'cat_id'];

    public function genPaginate($limit)
    {
       $dataArr = [];
       $table = $this->getTable();
       $data = Capsule::select("SELECT * FROM $table ORDER BY id DESC" . $limit);
       foreach ($data as $val) {
          $date = new Carbon($val->created_at);
          $cat = Category::where('id',$val->cat_id)->first();
          array_push($dataArr, [
             'id' => $val->id,
             'cat_id' => $val->cat_id,
             'cat'=>$cat,
             'name' => $val->name,
             'format_date' => $date->toFormattedDateString(),
             'created_at' => $val->created_at
          ]);
       }
       return $dataArr;
    }
}