<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "phpmailer/src/Exception.php";
require "phpmailer/src/PHPMailer.php";

$mail = new PHPMailer(true);
$mail->CharSet = "UTF-8";
$mail->setLanguage("ru", "phpmailer/language/");
$mail->IsHTML(true);

$mail->setFrom("Vladislav899913@gmail.com", "Владислав Громийчук");
$mail->addAddress("dashaboizova@mail.ru");
$mail->Subject = "Привет! Это Владислав Громийчук";

$body = "<h1>Новое письмо!</h1>";

if (trim(!empty($POST["surname"]))) {
    $body.="<p><strong>Фамилия:</strong> ".$POST["surname"]."</p>";
}
if (trim(!empty($POST["name"]))) {
    $body.="<p><strong>Имя:</strong> ".$POST["name"]."</p>";
}
if (trim(!empty($POST["patronymic"]))) {
    $body.="<p><strong>Отчество:</strong> ".$POST["patronymic"]."</p>";
}
if (trim(!empty($POST["email"]))) {
    $body.="<p><strong>E-mail:</strong> ".$POST["email"]."</p>";
}
if (trim(!empty($POST["phone"]))) {
    $body.="<p><strong>Телефон:</strong> ".$POST["phone"]."</p>";
}

$mail->Body = $body;

if(!$mail->send()) {
    $message = "Ошибка!";
} else {
    $message = "Данные отправлены!";
}

$response = ["message" => $message];

header("Content-type: application/json");
echo json_encode($response);

// $surname = $_POST["surname"];
// $name = $_POST["name"];
// $patronymic = $_POST["patronymic"];
// $email = $_POST["email"];
// $phone = $_POST["phone"];
// $text = $_POST["text"];
?>