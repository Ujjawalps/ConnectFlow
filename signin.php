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
        
            // Send JSON response with username
            echo json_encode([
                'status' => 'success',
                'username' => $user['username'] // Return the username
            ]);
            exit();
        }
        
    } else {
        $_SESSION['errorMessage'] = "No account found with that email.";
        header("Location: index.php"); // Redirect back to index
        exit();
    }
}
?>
