<?php
session_start();
if (!isset($_SESSION['manager_id'])) {
    header('Location: login.php');
    exit();
}

include 'db.php';

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Fetch families
$familiesStmt = $pdo->query('SELECT id, family_name FROM families');
$families = $familiesStmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $family_id = $_POST['family_id'];
        $description = $_POST['description'];
        $request_date = date('Y-m-d');  // Assuming the request date is the current date

        $stmt = $pdo->prepare('INSERT INTO maintenance_requests (family_id, description, status, request_date) VALUES (?, ?, "Pending", ?)');
        $stmt->execute([$family_id, $description, $request_date]);

        echo "Maintenance request submitted successfully.";
    } catch (Exception $e) {
        error_log($e->getMessage());  // Log error message
        echo "Error submitting maintenance request.";
    }
}
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت درخواست تعمیرات</title> <!-- Translate title to Persian -->
    <link rel="stylesheet" href="style.css"> <!-- Linking style.css -->
</head>
<body>
    <h1>ثبت درخواست تعمیرات</h1> <!-- Translate heading to Persian -->
    <form method="post">
        <label for="family_id">انتخاب خانواده:</label> <!-- Translate label for family selection -->
        <select name="family_id" id="family_id" required>
            <?php foreach ($families as $family): ?>
                <option value="<?= $family['id'] ?>"><?= $family['family_name'] ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="description">توضیحات:</label> <!-- Translate label for description -->
        <textarea name="description" id="description" required></textarea><br><br>

        <button type="submit">ثبت درخواست</button> <!-- Translate button text to Persian -->
    </form>
    
            <a href="dashboard.php" class="float-button">&#127968;</a>
        <?php include 'footer.php'; ?>

</body>
</html>
