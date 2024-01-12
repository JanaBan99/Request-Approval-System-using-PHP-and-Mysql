<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:/xampp/htdocs/RA_System/system admin/phpmailer/src/Exception.php';
require 'C:/xampp/htdocs/RA_System/system admin/phpmailer/src/PHPMailer.php';
require 'C:/xampp/htdocs/RA_System/system admin/phpmailer/src/SMTP.php';

function sendEmail($recipient, $subject, $message) {
    $mail = new PHPMailer(true); // Passing `true` enables exceptions

    try {
        // Server settings
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com'; // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true; // Enable SMTP authentication
        $mail->Username   = 'liferocks990611@gmail.com'; // SMTP username
        $mail->Password   = 'gbgocuxwvxzhumuk'; // SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption, 'ssl' also accepted
        $mail->Port       = 587; // TCP port to connect to

        // Sender and recipient settings
        $mail->setFrom('your_email@example.com', 'Your Name');
        $mail->addAddress($recipient);

        // Email content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
?>
