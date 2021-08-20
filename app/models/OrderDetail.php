<?php 

namespace App\models;

use App\models\Product;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model{
    protected $fillable = ['order_id','product_id','product_name','price','quantity','is_send'];
    protected $table = 'order_detail';
    public function product(){
        return $this->belongsTo(new Product(),'product_id');
    }
}