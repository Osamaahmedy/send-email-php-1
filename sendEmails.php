
    <?php

  require 'db.php';
    $message = $_POST['message']; // استرجاع نص الرسالة من النموذج
    $message1 = $_POST['message1'];
   
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'asaam4292@gmail.com';
        $mail->Password = 'dlfzquvpxggyxxgv'; // تأكد من أن كلمة المرور صحيحة
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // إعداد البريد الإلكتروني
        $mail->setFrom('asaam4292@gmail.com', 'Mailer');

        // استرجاع عناوين البريد الإلكتروني من قاعدة البيانات
        $result = mysqli_query($conn, "SELECT email2, email1 FROM mail");

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $mail->addAddress($row['email2'], $row['email1']);
                $mail->Subject = 'Welcome to Our Site';
                $mail->isHTML(true);
                $mail->Body = "<br>{$message}</br> {$row['email1']},<br>{$message1}</br>"; // إضافة نص الرسالة هنا

                // إرسال البريد الإلكتروني
                if (!$mail->send()) {
                    echo "Failed to send email to {$row['email1']}. Mailer Error: {$mail->ErrorInfo}<br>";
                } else {
                    echo "Email sent to {$row['email1']} successfully!<br>";
                }

                // إعادة تعيين العناوين قبل إرسال البريد الإلكتروني التالي
                $mail->clearAddresses();
            }
        } else {
            echo "Error in SQL query: " . mysqli_error($conn);
        }

    } catch (Exception $e) {
        echo "Failed to send emails. Mailer Error: {$mail->ErrorInfo}";
    }

    mysqli_close($conn);
    ?>

</body>

</html>