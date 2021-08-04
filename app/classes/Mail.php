<?php
namespace App\Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Mail{
    private $mail;
    public function __construct()
    {
        $this->mail = new PHPMailer();
        $this->setUp();
    }
    public function setUp(){
        if($_ENV['APP_ENV'] === 'local'){
            $this->mail->SMTPDebug = 2; // production use => 1 - hide detail // local use = 2 - show detail 
        }
      $this->mail->isSMTP();
      $this->mail->Host = $_ENV['SMTP_HOST'];
      $this->mail->SMTPAuth = true;
      $this->mail->Username = $_ENV['EMAIL_USERNAME'];
      $this->mail->Password = $_ENV['EMAIL_PASSWORD'];
      $this->mail->SMTPSecure = $_ENV['MAIL_ENCRYPTION'];
      $this->mail->Port = $_ENV['SMTP_PORT'];

      $this->mail->isHTML(true);

      $this->mail->From = $_ENV['ADMIN_EMAIL'];
      $this->mail->FromName = 'Buy Now Shopping';

    }

    public function send(){

        $content = "Testing mail from Buy Now Shopping ";
        $this->mail->addAddress('aungbarlaay7777@gmail.com','Pyae Phyoe Naing'); // Name is optional
        $this->mail->Subject = "Buy Now Shopping";
        $this->mail->Body = $content;

        return $this->mail->send();
    }
}