<?php

use App\Classes\Mail;

require_once '../bootstrap/init.php';

$mail = new Mail();

$content = "Testing mail from Buy Now Shopping ";

$data = [
    "to"=>"aungbarlaay7777@gmail.com",
    "from_name"=>"Pyae Phyoe Naing",
    "subject"=>"Buy Now Shopping",
    "content" => $content,
    "filename"=>"mail",
    "img_link"=> "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSlPsFp6x3bSGfAwzw9jxCGPLBG2ZQOmXIJLQ&usqp=CAU"
];

// $cond = $mail->send($data);
// if($cond){
//     echo 'Email send success!';
// }else{
//     echo 'Email send fail!';
// }


