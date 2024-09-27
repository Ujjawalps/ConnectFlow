<?php
$to = 'ujjawalpratapsingh2223@gmail.com'; // Your email address
$subject = 'Test Email';
$message = 'This is a test email sent from PHP.';
$headers = 'From: test@example.com' . "\r\n" . 
           'Reply-To: test@example.com' . "\r\n" . 
           'X-Mailer: PHP/' . phpversion();

$mailSuccess = mail($to, $subject, $message, $headers);

if ($mailSuccess) {
    echo 'Email sent successfully!';
} else {
    echo 'Email sending failed.';
}
?>
