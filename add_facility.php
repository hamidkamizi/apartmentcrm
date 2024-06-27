<?php
session_start();
if (!isset($_SESSION['manager_id'])) {
    header('Location: login.php');
    exit();
}

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];

    $stmt = $pdo->prepare('INSERT INTO facilities (name, description) VALUES (?, ?)');
    $stmt->execute([$name, $description]);

    echo "Facility added.";
}
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>افزودن امکانات</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            direction: rtl;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="post">
            <div class="form-group">
                <label for="name">نام امکانات:</label>
                <input type="text" id="name" name="name" placeholder="نام امکانات" required>
            </div>
            <div class="form-group">
                <label for="description">توضیحات:</label>
                <textarea id="description" name="description" placeholder="توضیحات" required></textarea>
            </div>
            <button type="submit">افزودن امکانات</button>
        </form>
    </div>
    
    <a href="dashboard.php" class="float-button">&#127968;</a>

    <?php include 'footer.php'; ?>

</body>
</html>
