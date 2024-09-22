<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Set the recipient email address
    $to = "ujjawalpratapsingh2223@gmail.com"; // Replace with your email address

    // Create the email headers
    $headers = "From: $name <$email>\r\n";

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "Message sent successfully.";
        header("Location: main.html"); // Redirect to thank you page
        exit();
    } else {
        echo "Message could not be sent.";
    }
}
?>
