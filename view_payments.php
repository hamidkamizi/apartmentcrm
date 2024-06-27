<?php
session_start();
if (!isset($_SESSION['manager_id'])) {
    header('Location: login.php');
    exit();
}

include 'db.php';

$stmt = $pdo->query('SELECT payments.*, families.family_name FROM payments JOIN families ON payments.family_id = families.id');
$payments = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl"> <!-- Setting the language to Persian (fa) -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مشاهده پرداخت‌ها</title> <!-- Translate title to Persian -->
    <link rel="stylesheet" href="style.css"> <!-- Linking style.css -->
</head>
<body>
    <h1>پرداخت‌ها</h1> <!-- Translate heading to Persian -->
    <table>
        <tr>
            <th>نام خانواده</th> <!-- Translate table headers to Persian -->
            <th>مبلغ</th>
            <th>تاریخ پرداخت</th>
            <th>عملیات</th>
        </tr>
        <?php foreach ($payments as $payment): ?>
        <tr>
            <td><?= htmlspecialchars($payment['family_name']) ?></td>
            <td><?= htmlspecialchars($payment['amount']) ?></td>
            <td><?= htmlspecialchars($payment['payment_date']) ?></td>
            <td>
                <a href="view_invoice.php?payment_id=<?= $payment['id'] ?>" target="_blank">چاپ فاکتور</a> <!-- Translate link to Persian -->
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
                <a href="dashboard.php" class="float-button">&#127968;</a>

        <?php include 'footer.php'; ?>

</body>
</html>
