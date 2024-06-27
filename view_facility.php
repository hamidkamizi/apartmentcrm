<?php
include 'db.php';

$stmt = $pdo->query('SELECT * FROM facilities');
$facilities = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl"> <!-- Setting the language to Persian (fa) -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مشاهده امکانات</title> <!-- Translate title to Persian -->
    <link rel="stylesheet" href="style.css"> <!-- Linking style.css -->
</head>
<body>
    <h1>امکانات</h1> <!-- Translate heading to Persian -->
    <table>
        <tr>
            <th>نام</th> <!-- Translate table headers to Persian -->
            <th>توضیحات</th>
        </tr>
        <?php foreach ($facilities as $facility): ?>
        <tr>
            <td><?= htmlspecialchars($facility['name']) ?></td>
            <td><?= htmlspecialchars($facility['description']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
                <a href="dashboard.php" class="float-button">&#127968;</a>

        <?php include 'footer.php'; ?>

</body>
</html>
