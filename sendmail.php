<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "phpmailer/src/Exception.php";
require "phpmailer/src/PHPMailer.php";

$mail = new PHPMailer(true);
$mail->CharSet = "UTF-8";
$mail->setLanguage("ru", "phpmailer/language/");
$mail->IsHTML(true);

$mail->setFrom("teh-asizol@yandex.ru", "ТЕХ-АС «ИЗОЛЯЦИЯ»");
$mail->addAddress("teh-asizol@yandex.ru");
$mail->Subject = "ТЕХ-АС «ИЗОЛЯЦИЯ»";

$body = "<h1>Новая заявка!</h1>";

if (trim(!empty($_POST["FIO"]))) {
    $body.="<p><strong>ФИО:</strong> ".$_POST["FIO"]."</p>";
}
if (trim(!empty($_POST["phone"]))) {
    $body.="<p><strong>Телефон:</strong> ".$_POST["phone"]."</p>";
}
if (trim(!empty($_POST["email"]))) {
    $body.="<p><strong>E-mail:</strong> ".$_POST["email"]."</p>";
}
$body.="<p><strong>Должность:</strong> ".$_POST["vacancy"]."</p>";
if (trim(!empty($_POST["comment"]))) {
    $body.="<p><strong>Сообщение:</strong> ".$_POST["comment"]."</p>";
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