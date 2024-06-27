<?php
session_start();
if (!isset($_SESSION['manager_id'])) {
    header('Location: login.php');
    exit();
}

include 'db.php';

$stmt = $pdo->query('SELECT * FROM families');
$families = $stmt->fetchAll();
?>

<!<!DOCTYPE html>
<html lang="fa" dir="rtl"> <!-- Setting the language to Persian (fa) -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مشاهده خانواده‌ها</title> <!-- Translate title to Persian -->
    <link rel="stylesheet" href="style.css"> <!-- Linking style.css -->
</head>
<body>
    <h1>خانواده‌ها</h1> <!-- Translate heading to Persian -->
    <table>
        <tr>
            <th>نام خانواده</th> <!-- Translate table headers to Persian -->
            <th>نام سرپرست</th>
            <th>شماره تماس</th>
            <th>شماره آپارتمان</th>
            <th>عملیات</th>
        </tr>
        <?php foreach ($families as $family): ?>
        <tr>
            <td><?= htmlspecialchars($family['family_name']) ?></td>
            <td><?= htmlspecialchars($family['head_name']) ?></td>
            <td><?= htmlspecialchars($family['contact_number']) ?></td>
            <td><?= htmlspecialchars($family['apartment_number']) ?></td>
            <td>
                <a href="edit_family.php?id=<?= $family['id'] ?>">ویرایش</a> <!-- Translate links to Persian -->
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
                <a href="dashboard.php" class="float-button">&#127968;</a>

        <?php include 'footer.php'; ?>

</body>
</html>
