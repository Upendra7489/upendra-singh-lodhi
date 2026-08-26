<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars(trim($_POST["name"] ?? ""));
    $email = filter_var(trim($_POST["email"] ?? ""), FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars(trim($_POST["subject"] ?? ""));
    $message = htmlspecialchars(trim($_POST["message"] ?? ""));

    if (
        empty($name) ||
        empty($email) ||
        empty($subject) ||
        empty($message) ||
        !filter_var($email, FILTER_VALIDATE_EMAIL)
    ) {
        die("Please fill all fields correctly.");
    }

    // Apni Gmail ID yahan daalein
    $to = "upendra01470123@gmail.com@gmail.com";

    $mail_subject = "Website Contact: " . $subject;

    $body = "New message received from website\n\n";
    $body .= "Name: " . $name . "\n";
    $body .= "Email: " . $email . "\n";
    $body .= "Subject: " . $subject . "\n\n";
    $body .= "Message:\n" . $message . "\n";

    // Better to use an email address from your own domain here
    $headers = "From: Website <noreply@yourdomain.com>\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";

    if (mail($to, $mail_subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Sorry, message could not be sent.";
    }

} else {
    echo "Invalid request.";
}

?>
