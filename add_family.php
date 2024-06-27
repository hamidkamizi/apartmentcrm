<?php
session_start();
if (!isset($_SESSION['manager_id'])) {
    header('Location: login.php');
    exit();
}

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $family_name = $_POST['family_name'];
    $head_name = $_POST['head_name'];
    $contact_number = $_POST['contact_number'];
    $apartment_number = $_POST['apartment_number'];

    $stmt = $pdo->prepare('INSERT INTO families (family_name, head_name, contact_number, apartment_number) VALUES (?, ?, ?, ?)');
    $stmt->execute([$family_name, $head_name, $contact_number, $apartment_number]);

    header('Location: view_families.php');
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اضافه کردن خانواده</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            direction: rtl;
            text-align: right;
        }
        input::placeholder {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="post">
            <div class="form-group">
                <label for="family_name">نام خانوادگی:</label>
                <input type="text" id="family_name" name="family_name" placeholder="نام خانوادگی" required>
            </div>
            <div class="form-group">
                <label for="head_name">نام سرپرست:</label>
                <input type="text" id="head_name" name="head_name" placeholder="نام سرپرست" required>
            </div>
            <div class="form-group">
                <label for="contact_number">شماره تماس:</label>
                <input type="text" id="contact_number" name="contact_number" placeholder="شماره تماس" required>
            </div>
            <div class="form-group">
                <label for="apartment_number">شماره آپارتمان:</label>
                <input type="text" id="apartment_number" name="apartment_number" placeholder="شماره آپارتمان" required>
            </div>
            <input type="submit" value="اضافه کردن خانواده">
        </form>
    </div>
        <a href="dashboard.php" class="float-button">&#127968;</a>

        <?php include 'footer.php'; ?>

</body>
</html>
