<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../assets/PHPMailer\PHPMailer-master/src/Exception.php';
require '../assets/PHPMailer\PHPMailer-master/src/PHPMailer.php';
require '../assets/PHPMailer\PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'consequel@gmail.com';
    $mail->Password = 'rkgh bgxw ufev usty';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Sender (MUST be your Gmail)
    $mail->setFrom('consequel@gmail.com', 'Website Contact');

    // Receiver
    $mail->addAddress('consequel@gmail.com');

    // Reply-to (user email)
    $mail->addReplyTo($_POST['email'], $_POST['name']);

    // Content
    $mail->isHTML(true);
    $mail->Subject = $_POST['subject'];
    $mail->Body = "
        <b>Client Name:</b> {$_POST['name']} <br>
        <b>Email used:</b> {$_POST['email']} <br><br>
        <b>Message:</b><br>{$_POST['message']}
    ";

    $mail->send();
        echo "success";
} catch (Exception $e) {
    echo "error";
}
?>
