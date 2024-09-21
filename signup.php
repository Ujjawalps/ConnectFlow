<?php
session_start();
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = $_POST['password'];
    $confirmPassword = $_POST['conf-password'];

    // Validate form input
    if (empty($name) || strlen($name) < 2) {
        $errorMessage = "Please enter a valid name (at least 2 characters).";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = "Please enter a valid email address.";
    } elseif (strlen($password) < 8) {
        $errorMessage = "Password must be at least 8 characters long.";
    } elseif ($password !== $confirmPassword) {
        $errorMessage = "Passwords do not match.";
    } else {
        // Check if email already exists
        $checkEmailQuery = "SELECT * FROM users WHERE email = ?";
        $stmt = $con->prepare($checkEmailQuery);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $errorMessage = "Email already exists. Please use a different email.";
        } else {
            // Hash the password and insert the user
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $insertQuery = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
            $stmt = $con->prepare($insertQuery);
            $stmt->bind_param("sss", $name, $email, $hashedPassword);

            if ($stmt->execute()) {
                $successMessage = "Sign-up successful! You can now log in.";

                // Send JSON response for success
                echo json_encode([
                    'status' => 'success',
                    'message' => $successMessage
                ]);
                exit();
            } else {
                $errorMessage = "Error occurred while signing up: " . $stmt->error;
            }
        }
    }

    // Send JSON response for error
    echo json_encode([
        'status' => 'error',
        'message' => $errorMessage
    ]);
    exit();
}
?>
