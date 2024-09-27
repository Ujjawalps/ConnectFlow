<?php
$to = "ujjawalpratapsingh2223@gmail.com"; // Your email (or MailHog test)
$subject = "Test Mail";
$message = "This is a test email to check if MailHog is working correctly.";
$headers = "From: test@example.com";

if (mail($to, $subject, $message, $headers)) {
    echo "Test email sent successfully!";
} else {
    echo "Failed to send test email.";
}
?>
