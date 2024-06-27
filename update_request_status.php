<?php
session_start();
if (!isset($_SESSION['manager_id'])) {
    header('Location: login.php');
    exit();
}

include 'db.php';

$id = $_GET['id'];
$status = $_GET['status'];

$stmt = $pdo->prepare('UPDATE maintenance_requests SET status = ? WHERE id = ?');
$stmt->execute([$status, $id]);

header('Location: view_requests.php');
?>
