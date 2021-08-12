<?php


namespace App\models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as Capsule;

class Category extends Model
{
   protected $fillable = ['name', 'slug'];

   public function genPaginate($limit)
   {
      $dataArr = [];
      $table = $this->getTable();
      $data = Capsule::select("SELECT * FROM $table ORDER BY id DESC" . $limit);
      foreach ($data as $val) {
         $date = new Carbon($val->created_at);
         array_push($dataArr, [
            'id' => $val->id,
            'name' => $val->name,
            'slug' => $val->slug,
            'format_date' => $date->toFormattedDateString(),
            'created_at' => $val->created_at
         ]);
      }
      return $dataArr;
   }
}
