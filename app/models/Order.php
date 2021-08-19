<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model{
    protected $fillable = ['user_id','price'];
}