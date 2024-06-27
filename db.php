<?php
$host = 'localhost';
$db = 'consiste_ams';
$user = 'consiste_ams';  // Change as per your configuration
$pass = 'eyx3nG+iTA^M';  // Change as per your configuration

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $db :" . $e->getMessage());
}
?>
