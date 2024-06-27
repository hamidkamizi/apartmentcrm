<?php
session_start();
if (!isset($_SESSION['manager_id'])) {
    header('Location: login.php');
    exit();
}

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $family_id = $_POST['family_id'];
    $amount = $_POST['amount'];
    $payment_date = $_POST['payment_date'];

    $stmt = $pdo->prepare('INSERT INTO payments (family_id, amount, payment_date) VALUES (?, ?, ?)');
    $stmt->execute([$family_id, $amount, $payment_date]);

    header('Location: view_payments.php');
}

$stmt = $pdo->query('SELECT * FROM families');
$families = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>افزودن پرداخت</title> <!-- Translate title to Persian -->
    <link rel="stylesheet" href="style.css"> <!-- Linking style.css -->
</head>
<body>
    <form method="post">
        <select name="family_id" required>
            <?php foreach ($families as $family): ?>
                <option value="<?= $family['id'] ?>"><?= htmlspecialchars($family['family_name']) ?></option>
            <?php endforeach; ?>
        </select>
        <input type="number" name="amount" placeholder="مبلغ" step="0.01" required> <!-- Translate placeholder to Persian -->
        <input type="date" name="payment_date" required> <!-- No translation needed for date input -->
        <button type="submit">افزودن پرداخت</button> <!-- Translate button text to Persian -->
    </form>
    
        <a href="dashboard.php" class="float-button">&#127968;</a>
        <?php include 'footer.php'; ?>

</body>
</html>
