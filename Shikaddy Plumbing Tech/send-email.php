<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    // Your email address
    $to = "your-email@example.com"; // Replace with your email address
    $subject = "New Message from $name";
    
    // Email headers
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "Content-Type: text/html; charset=UTF-8";

    // Email body
    $body = "<h2>You have a new message from $name</h2>";
    $body .= "<p><strong>Email:</strong> $email</p>";
    $body .= "<p><strong>Phone:</strong> $phone</p>";
    $body .= "<p><strong>Message:</strong></p>";
    $body .= "<p>$message</p>";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "<div class='alert-success'>Message sent successfully!</div>";
    } else {
        echo "<div class='alert-error'>There was an error sending the message. Please try again later.</div>";
    }
}
?>
