<?php
include 'db.php';

$stmt = $pdo->query('SELECT visitors.*, families.family_name FROM visitors JOIN families ON visitors.family_id = families.id ORDER BY visit_date DESC');
$visitors = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fa"> <!-- Setting the language to Persian (fa) -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مشاهده بازدیدکنندگان</title> <!-- Translate title to Persian -->
    <link rel="stylesheet" href="style.css"> <!-- Linking style.css -->
</head>
<body>
    <h1>بازدیدکنندگان</h1> <!-- Translate heading to Persian -->
    <table>
        <tr>
            <th>نام بازدیدکننده</th> <!-- Translate table headers to Persian -->
            <th>شماره تماس</th>
            <th>تاریخ بازدید</th>
            <th>خانواده مورد بازدید</th>
        </tr>
        <?php foreach ($visitors as $visitor): ?>
        <tr>
            <td><?= htmlspecialchars($visitor['name']) ?></td>
            <td><?= htmlspecialchars($visitor['contact_number']) ?></td>
            <td><?= htmlspecialchars($visitor['visit_date']) ?></td>
            <td><?= htmlspecialchars($visitor['family_name']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
                <a href="dashboard.php" class="float-button">&#127968;</a>

        <?php include 'footer.php'; ?>

</body>
</html>
