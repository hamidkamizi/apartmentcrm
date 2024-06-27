<?php
session_start();
if (!isset($_SESSION['manager_id'])) {
    header('Location: login.php');
    exit();
}

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $post_date = date('Y-m-d');

    $stmt = $pdo->prepare('INSERT INTO notices (title, content, post_date) VALUES (?, ?, ?)');
    $stmt->execute([$title, $content, $post_date]);

    echo "Notice posted.";
}
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <title>ارسال اطلاعیه</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <form method="post">
            <label for="title">عنوان</label>
            <input type="text" id="title" name="title" placeholder="عنوان" required>
            <label for="content">محتوا</label>
            <textarea id="content" name="content" placeholder="محتوا" required></textarea>
            <button type="submit">ارسال اطلاعیه</button>
        </form>
    </div>
        <a href="dashboard.php" class="float-button">&#127968;</a>

        <?php include 'footer.php'; ?>

</body>
</html>
