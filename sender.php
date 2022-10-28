<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require "PHPMailer/src/Exception.php";
    require "PHPMailer/src/PHPMailer.php";

    $mail = new PHPMailer(true);
    $mail->CharSet = "UTF-8";

    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["text"];

    $body = $name . ' ' . $email . ' ' . $message;
    $theme = "заявка с формы]";

    $mail->addAddress("art.bertes@gmail.com");

    $mail->Subject = $theme;
    $mail->Body = $body;

    $mail->send();

