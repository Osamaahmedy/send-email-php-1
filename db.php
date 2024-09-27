<?php
$host = '127.0.0.1';
$port = 4306; // عادةً ما يكون المنفذ الافتراضي لـ MySQL هو 3306
$dbusername = 'root';
$dbpassword = 'root';
$dbname = 'mail_db';

$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname, $port);

if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}
?>