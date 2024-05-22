<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/Exception.php";

$mail = new PHPMailer(true);
$mail->CharSet = "UTF-8";

// Enable verbose debug output
$mail->SMTPDebug = 2;
$mail->Debugoutput = 'html';

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com'; // Замените на ваш SMTP-сервер
$mail->SMTPAuth = true;
$mail->Username = 'dude.cuvak005@gmail.com'; // Замените на ваш email
$mail->Password = 'aiugmjjydouinowb'; // Замените на ваш пароль
$mail->SMTPSecure = 'ssl'; // Или 'ssl' в зависимости от настроек вашего SMTP
$mail->Port = 465; // Или 465 для 'ssl'

$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$message = $_POST["message"];

$body = $name . ' ' . $phone . ' ' . $email . ' ' . $message;
$theme = "[Вопрос с формы]";

$mail->setFrom('dude.cuvak005@gmail.com', 'Your Name'); // Замените на ваш email и имя
$mail->addAddress("dude.cuvak005@gmail.com");

$mail->Subject = $theme;
$mail->Body = $body;


try {
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
?>
