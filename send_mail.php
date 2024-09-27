<?php
session_start();

// Admin email where messages will be sent
$adminEmail = 'ujjawalpratapsingh2223@gmail.com';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    error_log("POST request received."); // Log request received
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate form data
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        error_log("Form validation failed."); // Log validation failure
        echo json_encode([
            'status' => 'error',
            'message' => 'Please fill in all fields.'
        ]);
        exit;
    }

    // Send email
    $to = $adminEmail;
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    $mailSuccess = mail($to, $subject, $message, $headers);
    error_log("Mail send attempt: " . ($mailSuccess ? "successful" : "failed")); // Log mail attempt

    if ($mailSuccess) {
        echo json_encode([
            'status' => 'success',
            'message' => 'Your message was sent, thank you!'
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Failed to send your message, please try again later.'
        ]);
    }
}
?>
