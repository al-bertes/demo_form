<?php
// Файлы phpmailer
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'PHPMailer/src/SMTP.php';
require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/Exception.php";

// Переменные, которые отправляет пользователь
$name = $_POST['name'];
$email = $_POST['email'];
$text = $_POST['text'];

// Формирование самого письма
$title = "Заголовок письма";
$body = "
<h2>Новое письмо</h2>
<b>Имя:</b> $name<br>
<b>Почта:</b> $email<br><br>
<b>Сообщение:</b><br>$text
";

// Настройки PHPMailer
$mail = new PHPMailer();

    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    $mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};
    
    // Настройки вашей почты
    $mail->Host       = 'smtp.gmail.com'; // SMTP сервера вашей почты
    $mail->Username   = 'art.bertes@gmail.com'; // Логин на почте
    $mail->Password   = 'qarqxlukbkepoumv'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('art.bertes@gmail.com', 'Имя отправителя'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress('askoltpupkov@gmail.com');   // Ещё один, если нужен

 

// Отправка сообщения
$mail->isHTML(true);
$mail->Subject = $title;
$mail->Body = $body;    

// Проверяем отравленность сообщения
if ($mail->send()) {$result = "success";} 
else {$result = "error";}

 catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

// Отображение результата
echo json_encode(["result" => $result, "resultfile" => $rfile, "status" => $status]);

