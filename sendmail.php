<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exeption;

require 'PHPMailer-6.1.7\src\Exception.php';
require 'PHPMailer-6.1.7\src\PHPMailer.php';

$mail = new PHPMailer(true);
$mail -> CharSet = 'UTF-8';
//$mail -> setLanguage ('ru', 'phpmailer/language/');
$mail -> IsHTML(true);

$mail->setForm('city@proektlab.com.ua', 'qweqwe');
$mail->addAddress('city@proektlab.com.ua');
$mail->Subject = 'sosi';


$body = '<h1>sdgfsdg</h1>';
if(trim(!empty($_POST['name']))){
    $body.='<p><strong>Name: </strong> '.$_POST['Name'].'</p>';
}
if(trim(!empty($_POST['email']))){
    $body.='<p><strong>Phone: </strong> '.$_POST['number'].'</p>';
}


$mail->Body = $body;

if(!mail->send()){
    $message = 'error';
}else{
    $message = 'done';
}

$response = ['message' => $message];

header ('Content-type: application/json');
echo json_encode($response);
?>