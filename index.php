<?php
session_start();

// Check if manager_id is not set in session or if the session has expired
if (!isset($_SESSION['manager_id'])) {
    header('Location: login.php'); // Redirect to login.php
    exit(); // Stop executing further code
} else {
    header('Location: dashboard.php'); // Redirect to dashboard.php if logged in
    exit(); // Stop executing further code
}
?>
