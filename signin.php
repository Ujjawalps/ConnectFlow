<?php
session_start();
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars(trim($_POST['email']));
    $password = $_POST['password'];

    // Check if the email exists
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // Verify the password
        if (password_verify($password, $user['password'])) {
            $_SESSION['loggedIn'] = true;
            $_SESSION['username'] = $user['username'];
            header("Location: home.php"); // Redirect to home page
            exit();
        } else {
            $_SESSION['errorMessage'] = "Incorrect password.";
            header("Location: index.php"); // Redirect back to index
            exit();
        }
    } else {
        $_SESSION['errorMessage'] = "No account found with that email.";
        header("Location: index.php"); // Redirect back to index
        exit();
    }
}
?>
