<?php
session_start();
if (!isset($_SESSION['manager_id'])) {
    header('Location: login.php');
    exit();
}

include 'db.php';
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>داشبورد</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>به داشبورد خوش آمدید</h1>

    <!-- Include menu -->
    <?php include 'menu.php'; ?>



    <!-- Include footer watermark -->
    <?php include 'footer.php'; ?>

</body>
</html>
