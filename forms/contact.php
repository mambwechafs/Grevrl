<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer files
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;

        // 👇 YOUR GMAIL
        $mail->Username = 'markusmambwe@gmail.com';
        
        // 👇 IMPORTANT: App Password (not your normal password)
        $mail->Password = 'dsoc remz cayg fhcw';

        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Email setup
        $mail->setFrom('markusmambwe@gmail.com', 'Website Contact');
        $mail->addAddress('markusmambwe@gmail.com');

        $mail->Subject = $subject;

        $mail->Body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

        $mail->send();

        echo "OK";

    } catch (Exception $e) {
        echo "Message failed: {$mail->ErrorInfo}";
    }
}