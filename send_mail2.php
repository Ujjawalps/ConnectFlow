<?php
// Include Composer's autoload
require 'vendor/autoload.php'; // This will include PHPMailer's classes

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();  // Use SMTP
        $mail->Host = 'smtp.gmail.com';  // Set the SMTP server to Gmail
        $mail->SMTPAuth = true;          // Enable SMTP authentication
        $mail->Username = 'ujjawalpratapsingh2223@gmail.com';  // Your Gmail address
        $mail->Password = 'vueg nqbz hikk foki';     // Your Gmail App Password (if 2FA is enabled)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Use STARTTLS for encryption
        $mail->Port = 587;  // Use port 587 for TLS

        // Recipients
        $mail->setFrom($email, $name);  // Use the user's email and name as the sender
        $mail->addAddress('ujjawalpratapsingh2223@gmail.com', 'Your Name');  // Your email as the recipient

        // Content
        $mail->isHTML(true);  // Send email in HTML format
        $mail->Subject = $subject;
        $mail->Body    = "Name: $name<br>Email: $email<br>Message: $message";
        $mail->AltBody = "Name: $name\nEmail: $email\nMessage: $message";  // Plain text version for non-HTML clients

        // Send email
        if ($mail->send()) {
            echo 'Message has been sent';
        } else {
            echo 'Message could not be sent.';
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
