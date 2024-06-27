<?php
include 'db.php';

$payment_id = $_GET['payment_id'];

$stmt = $pdo->prepare('SELECT payments.*, families.family_name FROM payments JOIN families ON payments.family_id = families.id WHERE payments.id = ?');
$stmt->execute([$payment_id]);
$payment = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl"> <!-- Setting the language to Persian (fa) -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صورتحساب</title> <!-- Translate title to Persian -->
    <link rel="stylesheet" href="style.css"> <!-- Linking style.css -->
</head>
<body>
    <h1>صورتحساب</h1> <!-- Translate heading to Persian -->
    <p>خانواده: <?= htmlspecialchars($payment['family_name']) ?></p> <!-- Translate labels to Persian -->
    <p>مبلغ: <?= htmlspecialchars($payment['amount']) ?></p>
    <p>تاریخ پرداخت: <?= htmlspecialchars($payment['payment_date']) ?></p>
    <a href="javascript:window.print()">چاپ صورتحساب</a> <!-- Translate link to Persian -->
                <a href="dashboard.php" class="float-button">&#127968;</a>

        <?php include 'footer.php'; ?>

</body>
</html>
