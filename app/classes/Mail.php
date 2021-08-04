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
      $this->mail->SMTPDebug = 2; // production use => 1 // local use = 2
      $this->mail->isSMTP();
      $this->mail->Host = $_ENV['SMTP_HOST'];
      $this->mail->SMTPAuth = true;
      $this->mail->Username = $_ENV['EMAIL_USERNAME'];
      $this->mail->Password = $_ENV['EMAIL_PASSWORD'];
      $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
      $this->mail->Port = $_ENV['SMTP_PORT'];

      $this->mail->isHTML(true);
      
      $this->mail->From = $_ENV['ADMIN_EMAIL'];
      $this->mail->FromName = 'Buy Now Shopping';

    }
}