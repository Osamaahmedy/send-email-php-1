<?php

$host = '127.0.0.1';
$port = 4306;
$dbusername = 'root';
$dbpassword = 'root';
$dbname = 'mail_db';

$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname, $port);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$email1 =  $_POST['email1'];
$email2 =  $_POST['email2'];

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // إعدادات SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPAuth = true;
    $mail->Username = 'asaam4292@gmail.com';
    $mail->Password = 'dlfzquvpxggyxxgv';
    $mail->SMTPSecure = 'tls'; // أو 'ssl' إذا كان مطلوبًا من قبل خادم SMTP الخاص بك
    $mail->Port = 587;
    
    // إعداد البريد الإلكتروني
    $mail->setFrom('no-reply@example.com', 'Mailer');
    $mail->addAddress('asaam4292@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = 'New Appointment';
    $mail->Body    = "Email 1: $email1<br>Email 2: $email2";

    $mail->send();
    echo 'Appointment made successfully and email sent!';
} catch (Exception $e) {
    echo "Appointment made, but email sending failed. Mailer Error: {$mail->ErrorInfo}";
}

if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

$message = [];

// Form 1
if (isset($_POST['email1']) && isset($_POST['email2'])) {
    $email1 = mysqli_real_escape_string($conn, $_POST['email1']);
    $email2 = mysqli_real_escape_string($conn, $_POST['email2']);

    $insertQuery = "INSERT INTO `mail` (email1, email2) VALUES ('$email1','$email2')";
    $insert = mysqli_query($conn, $insertQuery);

    if ($insert) {
        // إعدادات البريد الإلكتروني
        $to = 'asaam4292@example.com'; // استبدل هذا ببريدك الإلكتروني
        $subject = 'New Appointment';
        $body = "Email 1: $email1\nEmail 2: $email2";
        $headers = 'From: no-reply@example.com' . "\r\n" .
                   'Reply-To: no-reply@example.com' . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();

        // إرسال البريد الإلكتروني
        if (mail($to, $subject, $body, $headers)) {
            echo 'Appointment made successfully and email sent!';
        } 
    } else {
        echo 'Appointment failed';
    }
}

mysqli_close($conn);
?>