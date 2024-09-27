<?php
session_start();

if (!$_SESSION['admin']) {
    header('Location: admin_login.php');
    exit;
}

// Connect to database
// Retrieve emails from database
// Loop through emails and send welcome message

echo 'Emails sent successfully';
?>