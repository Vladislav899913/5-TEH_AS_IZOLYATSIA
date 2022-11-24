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
$mail->addAddress("Vladislav899913@gmail.com");
$mail->Subject = "ТЕХ-АС «ИЗОЛЯЦИЯ»";

$body = "<h1>Новое письмо!</h1>";

if (trim(!empty($_POST["FIO"]))) {
    $body.="<p><strong>ФИО:</strong> ".$_POST["FIO"]."</p>";
}
if (trim(!empty($_POST["phone"]))) {
    $body.="<p><strong>Телефон:</strong> ".$_POST["phone"]."</p>";
}
if (trim(!empty($_POST["email"]))) {
    $body.="<p><strong>E-mail:</strong> ".$_POST["email"]."</p>";
}
if (trim(!empty($_POST["message"]))) {
    $body.="<p><strong>Сообщение:</strong> ".$_POST["message"]."</p>";
}

$mail->Body = $body;

if(!$mail->send()) {
    $message = "Произошла ошибка при отправке заявки. Попробуйте снова.";
} else {
    $message = "Заявка отправлена!";
}

$response = ["message" => $message];

header("Content-type: application/json");
echo json_encode($response);
?>