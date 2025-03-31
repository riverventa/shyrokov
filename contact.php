<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Send email (replace with your own logic)
    // This is a simple example and does not send actual emails.
    // Modify this part to send emails using a library or service.
    $to = "example@example.com";
    $subject = "Contact Form Submission";
    $body = "Email: $email\n\nMessage:\n$message";

    // Send the email (you should use a proper email sending method)
    mail($to, $subject, $body);

    echo "Message sent successfully!";
}
?>
