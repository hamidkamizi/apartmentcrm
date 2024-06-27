<?php
session_start();
if (!isset($_SESSION['manager_id'])) {
    header('Location: login.php');
    exit();
}

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $family_name = $_POST['family_name'];
    $head_name = $_POST['head_name'];
    $contact_number = $_POST['contact_number'];
    $apartment_number = $_POST['apartment_number'];

    $stmt = $pdo->prepare('UPDATE families SET family_name = ?, head_name = ?, contact_number = ?, apartment_number = ? WHERE id = ?');
    $stmt->execute([$family_name, $head_name, $contact_number, $apartment_number, $id]);

    header('Location: view_families.php');
} else {
    $id = $_GET['id'];
    $stmt = $pdo->prepare('SELECT * FROM families WHERE id = ?');
    $stmt->execute([$id]);
    $family = $stmt->fetch();
}

?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ویرایش خانواده</title> <!-- Translate title to Persian -->
    <link rel="stylesheet" href="style.css"> <!-- Linking style.css -->
</head>
<body>
    <form method="post">
        <input type="hidden" name="id" value="<?= $family['id'] ?>">
        <input type="text" name="family_name" placeholder="نام خانواده" value="<?= htmlspecialchars($family['family_name']) ?>" required> <!-- Translate placeholder to Persian -->
        <input type="text" name="head_name" placeholder="نام سرپرست" value="<?= htmlspecialchars($family['head_name']) ?>" required> <!-- Translate placeholder to Persian -->
        <input type="text" name="contact_number" placeholder="شماره تماس" value="<?= htmlspecialchars($family['contact_number']) ?>" required> <!-- Translate placeholder to Persian -->
        <input type="text" name="apartment_number" placeholder="شماره آپارتمان" value="<?= htmlspecialchars($family['apartment_number']) ?>" required> <!-- Translate placeholder to Persian -->
        <button type="submit">به‌روزرسانی خانواده</button> <!-- Translate button text to Persian -->
    </form>
                <a href="dashboard.php" class="float-button">&#127968;</a>
        <?php include 'footer.php'; ?>

</body>
</html>
