<?php
session_start();
session_destroy(); // End the session
echo json_encode(['status' => 'success']); // Send response back
?>
