<?php
session_start();
if (!isset($_SESSION['manager_id'])) {
    header('Location: login.php');
    exit();
}

include 'db.php';

// Check if charge_id is provided
if (!isset($_GET['charge_id'])) {
    echo "Charge ID is missing.";
    exit();
}

$charge_id = $_GET['charge_id'];

try {
    // Update the status of the charge to "Paid"
    $stmt = $pdo->prepare('UPDATE charges SET status = "Paid" WHERE id = ?');
    $stmt->execute([$charge_id]);

    // Redirect back to view_charges.php
    header('Location: view_charges.php');
    exit();
} catch (PDOException $e) {
    // If an error occurs, print the error message
    echo "Error: " . $e->getMessage();
}
?>
