<?php
session_start();
include 'db.php';

$stmt = $pdo->query('SELECT maintenance_requests.*, families.family_name FROM maintenance_requests JOIN families ON maintenance_requests.family_id = families.id');
$requests = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl"> <!-- Setting the language to Persian (fa) -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مشاهده درخواست‌های تعمیرات</title> <!-- Translate title to Persian -->
    <link rel="stylesheet" href="style.css"> <!-- Linking style.css -->
</head>
<body>
    <h1>درخواست‌های تعمیرات</h1> <!-- Translate heading to Persian -->
    <table>
        <tr>
            <th>خانواده</th> <!-- Translate table headers to Persian -->
            <th>توضیحات</th>
            <th>وضعیت</th>
            <th>تاریخ درخواست</th>
            <th>عملیات</th>
        </tr>
        <?php foreach ($requests as $request): ?>
        <tr>
            <td><?= htmlspecialchars($request['family_name']) ?></td>
            <td><?= htmlspecialchars($request['description']) ?></td>
            <td><?= htmlspecialchars($request['status']) ?></td>
            <td><?= htmlspecialchars($request['request_date']) ?></td>
            <td>
                <a href="update_request_status.php?id=<?= $request['id'] ?>&status=In Progress">در حال انجام</a> <!-- Translate links to Persian -->
                <a href="update_request_status.php?id=<?= $request['id'] ?>&status=Completed">تکمیل شده</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
                <a href="dashboard.php" class="float-button">&#127968;</a>

        <?php include 'footer.php'; ?>

</body>
</html>
