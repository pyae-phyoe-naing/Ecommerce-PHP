<?php


namespace App\Controllers;

use App\models\User;
use App\Classes\Auth;
use App\models\Product;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\Redirect;
use App\Classes\CSRFToken;
use App\classes\ValidateRequest;
use App\Controllers\BaseController;
use App\models\Order;
use App\models\OrderDetail;

class IndexController extends BaseController
{
    public  function welcome()
    {
        if (Session::has('order-key')) Session::remove('order-key');
        $total_count = Product::count();
        list($product, $pages) = paginate(12, $total_count, new Product());
        $product = json_decode(json_encode($product));
        $carousel = Product::orderBy('id', 'desc')->get();
        return view('frontend.welcome', compact('product', 'pages', 'carousel'));
    }

    public function cart()
    {
        $request = Request::get('key_post');
        // Session::remove('token');
        if (!isset($request->token)) {
            Session::replace('fail', 'Token is empty');
            echo json_encode([
                "con" => false
            ]);
            exit;
        }
        if (CSRFToken::checkToken($request->token)) {
            if (is_array($request->cart)) {
                $addCartProduct = [];
                $cartItem = $request->cart;
                foreach ($cartItem as $item) {
                    $product = Product::where('id', $item)->first();
                    $product->qty = 1;
                    array_push($addCartProduct, $product);
                }
                echo json_encode([
                    "con" => true,
                    "data" => $addCartProduct
                ]);
                exit;
            } else {
                echo json_encode([
                    "con" => false
                ]);
                exit;
            }
        } else {
            Session::replace('fail', 'CSRF attack occur');
            echo json_encode([
                "con" => false
            ]);
            exit;
        }
    }
    public function showCart()
    {
        if (Session::has('order-key')) Session::remove('order-key');
        return view('frontend.show_cart');
    }
    public function orderConfirm()
    {
        if (Session::has('order-key')) Session::remove('order-key');
        if (Auth::check()) {
            return view('frontend.order_confirm');
        } else {
            Redirect::to('/user/login', ['info', 'Please First Login']);
        }
    }
    public function checkOut()
    {
        $validate = new ValidateRequest();
        $request = Request::get('key_post');
        if (!isset($request->token)) {
            echo json_encode([
                "csrf" => true
            ]);
            exit;
        } else {
            $rule = [
                "phone" => ["minLength" => "9", "maxLength" => "11", "uniqId"=>"users","required" => true],
                "address" => ["required" => true]
            ];
            $validate->checkValidate($request, $rule);
            if ($validate->hasError()) {
                echo json_encode([
                    "validation" => true,
                    "errors" => $validate->getError()
                ]);
                exit;
            } else {
                // Session::remove('token');
                if (CSRFToken::checkToken($request->token)) {
                    if ($this->saveOrder($request)) {
                        $key = rand(1, 1000) . time();
                        Session::replace('order-key', $key);
                        echo json_encode([
                            "con" => true,
                            "key" => $key
                        ]);
                    } else {
                        Session::replace('fail', 'Order Sending Fail...');
                        echo json_encode([
                            "con" => false
                        ]);
                        exit;
                    }
                } else {
                    echo json_encode([
                        "csrf" => true
                    ]);
                    exit;
                }
            }
        }
    }
    public function saveOrder($orders)
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $user->phone = $orders->phone;
        $user->address = escape($orders->address);
        $user->save();

        // Save Order
        $order = new Order();
        $order_price = 0;
        foreach($orders->products as $p){
            $order_price += $p->price * $p->qty;

            // Reduce Product Quantity
            $product = Product::findOrFail($p->id);
            $product->quantity = $product->quantity - $p->qty;
            $product->save();
        }

        // Save Order Table
        $order->user_id = $user_id;
        $order->price = $order_price;
        $order->save();
        

        // Save Order Detail Table
       
        foreach($orders->products as $p){
            $od = new OrderDetail();
            $od->order_id = $order->id;
            $od->product_id = $p->id;
            $od->product_name = $p->name;
            $od->price = $p->price;
            $od->quantity = $p->qty;
            $od->save();
        }

        return true;
    }
    public function successOrder($key)
    {
        if (Auth::check()) {
            if (Session::has('order-key')) {
                $sessionKey = Session::get('order-key');
                if ($sessionKey == $key) {
                    return view('frontend.order_success');
                } else {
                    Redirect::to('/');
                }
            } else {
                Redirect::to('/', ['fail', 'Please : First Send Order']);
            }
        } else {
            Redirect::to('/user/login', ['info', 'Please First Login']);
        }
    }
}
