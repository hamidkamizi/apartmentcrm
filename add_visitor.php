<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $contact_number = $_POST['contact_number'];
    $visit_date = date('Y-m-d');
    $family_id = $_POST['family_id'];

    $stmt = $pdo->prepare('INSERT INTO visitors (name, contact_number, visit_date, family_id) VALUES (?, ?, ?, ?)');
    $stmt->execute([$name, $contact_number, $visit_date, $family_id]);

    echo "Visitor logged.";
}

$stmt = $pdo->query('SELECT * FROM families');
$families = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت ورود بازدیدکننده</title> <!-- Translate title to Persian -->
    <link rel="stylesheet" href="style.css"> <!-- Linking style.css -->
</head>
<body>
    <form method="post">
        <input type="text" name="name" placeholder="نام بازدیدکننده" required> <!-- Translate placeholder to Persian -->
        <input type="text" name="contact_number" placeholder="شماره تماس" required> <!-- Translate placeholder to Persian -->
        <select name="family_id" required>
            <?php foreach ($families as $family): ?>
                <option value="<?= $family['id'] ?>"><?= htmlspecialchars($family['family_name']) ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">ثبت ورود</button> <!-- Translate button text to Persian -->
    </form>
                <a href="dashboard.php" class="float-button">&#127968;</a>

        <?php include 'footer.php'; ?>

</body>
</html>
