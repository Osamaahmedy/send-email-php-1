<?php
// تعيين عنوان URL الذي تريد التوجيه إليه
$url = 'login.php';

// استخدام دالة header لتوجيه المستخدم
header("Location: $url");

// إنهاء السكربت
exit();
?>