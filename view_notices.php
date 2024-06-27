<?php
include 'db.php';

$stmt = $pdo->query('SELECT * FROM notices ORDER BY post_date DESC');
$notices = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl"> <!-- Setting the language to Persian (fa) -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اطلاعیه‌ها</title> <!-- Translate title to Persian -->
    <link rel="stylesheet" href="style.css"> <!-- Linking style.css -->
</head>
<body>
    <h1>اطلاعیه‌ها</h1> <!-- Translate heading to Persian -->
    <ul>
        <?php foreach ($notices as $notice): ?>
        <li>
            <h2><?= htmlspecialchars($notice['title']) ?></h2>
            <p><?= htmlspecialchars($notice['content']) ?></p>
            <small>انتشار در: <?= htmlspecialchars($notice['post_date']) ?></small> <!-- Translate label to Persian -->
        </li>
        <?php endforeach; ?>
    </ul>
                <a href="dashboard.php" class="float-button">&#127968;</a>

        <?php include 'footer.php'; ?>

</body>
</html>
