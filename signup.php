<?php
// Start the session to store messages or session data if needed
session_start();

// Include the database connection
include 'connect.php';

// Initialize message variables to display in the modal later
$successMessage = '';
$errorMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data and sanitize it
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = $_POST['password'];
    $confirmPassword = $_POST['conf-password'];

    // Validate the form inputs
    if (empty($name) || strlen($name) < 2) {
        $errorMessage = "Please enter a valid name (at least 2 characters).";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = "Please enter a valid email address.";
    } elseif (strlen($password) < 8) {
        $errorMessage = "Password must be at least 8 characters long.";
    } elseif ($password !== $confirmPassword) {
        $errorMessage = "Passwords do not match.";
    } else {
        // Check if the email already exists in the database
        $checkEmailQuery = "SELECT * FROM users WHERE email = ?";
        $stmt = $con->prepare($checkEmailQuery);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $errorMessage = "Email already exists. Please use a different email.";
        } else {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert the new user into the database
            $insertQuery = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
            $stmt = $con->prepare($insertQuery);
            $stmt->bind_param("sss", $name, $email, $hashedPassword);

            if ($stmt->execute()) {
                $successMessage = "Sign-up successful! You can now log in.";
            } else {
                $errorMessage = "Error occurred while signing up: " . $stmt->error;
            }
        }
    }

    // Close the statement
    $stmt->close();

    // Optionally, redirect back to index.php with the success or error message
    if (!empty($successMessage)) {
        $_SESSION['successMessage'] = $successMessage;
    }
    if (!empty($errorMessage)) {
        $_SESSION['errorMessage'] = $errorMessage;
    }

    header("Location: index.php");
    exit();
}
?>
