<?php

use App\Classes\Mail;
use App\Classes\Session;
use App\models\Category;

require_once '../bootstrap/init.php';

$mail = new Mail();

$content = "Testing mail from Buy Now Shopping ";

$data = [
    "to"=>"aungbarlaay7777@gmail.com",
    "from_name"=>"Pyae Phyoe Naing",
    "subject"=>"Buy Now Shopping",
    "content" => $content,
    "filename"=>"mail",
    "img_link"=> "https://encrypted-tbn0.gstatic.com/uploads?q=tbn:ANd9GcSlPsFp6x3bSGfAwzw9jxCGPLBG2ZQOmXIJLQ&usqp=CAU"
];

// $cond = $mail->send($data);
// if($cond){
//     echo 'Email send success!';
// }else{
//     echo 'Email send fail!';
// }

 // Session::put('message',"I'm working!");
// Session::remove('message');
 // Session::replace('message','I am message wowww');
// beautify(Session::get('message'));
//  Session::flash('success','create successfully!');
// Session::flash('success');

// $validate = new \App\classes\ValidateRequest();
// check unique
//$con = $validate->unique('email','admin@gmail.com','users');
// check require
// $con = $validate->required('email','','users');
// check min / max
// $con = $validate->minLength('email','aaaaaaa','5');
// check email /string / number / mixed
//$con = $validate->mixed('email','123@abAB$.€','5');
//
//dd($con);

// Test Validate
$post = [
    "name"=>'',
    "email"=>'koko@gmail.com',
    'password'=>'123123',
    'age'=>23
];
$policy = [
    "name"=>["string"=>true,"minLength"=>4,"required"=>true],  //  check first last index
    "email"=>["email"=>true,"minLength"=>13,"required"=>true],
    "age"=>["number"=>true,"minLength"=>2,"required"=>true],

];
//$validator = new \App\classes\ValidateRequest();
//$validator->checkValidate($post,$policy);
//if($validator->hasError()){
//    beautify($validator->getError());
//}

