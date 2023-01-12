<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

class clsMail{
    
    private $mail = null;

    function __construct(){
        $this->mail = new PHPMailer();
        $this->mail->isSMTP();
        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure ='';
        $this->mail->Host = "smtp.gmail.com";
        $this->mail->Port =587;

        $this->mail->Username = "yennifor0123@gmail.com";
        $this->mail->Password ="irkzvklsmugpkvue";

    }

    public function metEnviar(string $titulo,  string $correo, string $asunto, string $bodyHTML){
        $this->mail->setFrom("yennifor0123@gmail.com",$titulo);
        $this->mail->addAddress($correo);
        $this->mail->subject = $asunto;
        $this->mail->Body = $bodyHTML;
        $this->mail->isHTML(true);
        $this->mail->CharSet = "UTF-8";

        return $this->mail->send();
    }
}

?>