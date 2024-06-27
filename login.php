<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare('SELECT * FROM managers WHERE username = ?');
    $stmt->execute([$username]);
    $manager = $stmt->fetch();

    if ($manager && $password == $manager['password']) { // Check plain text password
        $_SESSION['manager_id'] = $manager['id'];
        header('Location: dashboard.php');
        exit();
    } else {
        $error = "Invalid credentials.";
    }
}
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود به سیستم</title> <!-- Translate title to Persian -->
    <link rel="stylesheet" href="style.css"> <!-- Linking style.css -->
</head>
<body>
    <form method="post">
        <input type="text" name="username" placeholder="نام کاربری" required> <!-- Translate placeholder to Persian -->
        <input type="password" name="password" placeholder="رمز عبور" required> <!-- Translate placeholder to Persian -->
        <button type="submit">ورود</button> <!-- Translate button text to Persian -->
        <?php if (isset($error)): ?>
            <p class="error-message"><?= $error ?></p> <!-- Display error message if exists -->
        <?php endif; ?>
    </form>
        <?php include 'footer.php'; ?>

</body>
</html>
