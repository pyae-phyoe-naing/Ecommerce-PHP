<?php

namespace App\Controllers;

use App\models\Order;
use App\Classes\Redirect;
use App\models\OrderDetail;

class OrderController extends BaseController
{
    public function index()
    {
        $orders = Order::with('user')->latest()->get();
        return view('admin.order.index',compact('orders'));
    }
    public function orderDetail($id){
       $order_details = OrderDetail::with('product')->where('order_id',$id)->latest()->get();
       return view('admin.order.order_detail',compact('order_details'));

    }
    public function orderStatus($id){
        $odItem = OrderDetail::where('id',$id)->first();

        if($odItem !== NULL){
           $odItem->is_send = !$odItem->is_send;
           $odItem->update();
           Redirect::to('/admin/order/detail/'.$odItem->order_id);
        }else{
              Redirect::to('/admin/order');
        }
    }
}
