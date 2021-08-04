<?php

use App\Classes\Mail;

require_once '../bootstrap/init.php';

$mail = new Mail();
$cond = $mail->send();
if($cond){
    echo 'Email send success!';
}else{
    echo 'Email send fail!';
}