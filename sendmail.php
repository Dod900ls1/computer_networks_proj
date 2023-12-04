<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $fio = $_POST["fio"];
    $email = $_POST["email"];
    $topic = $_POST["topic"];
    $zapit = $_POST["zapit"];


    // Compose email message
    $to = 'recipients@email-address.com';
    $subject = 'Запитання від користувача: ' . $fio;

    // Set additional headers for sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: $email\r\n";

    // Send the email
    if (mail($to, $subject, $zapit, $headers)) {
        echo "SUCCESS";
    } else {
        echo "ERROR: " . error_get_last()['message'];
    }
} else {
    echo "ERROR: Form not submitted.";
}
?>
