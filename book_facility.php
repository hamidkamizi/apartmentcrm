<?php
session_start();
if (!isset($_SESSION['manager_id'])) {
    header('Location: login.php');
    exit();
}

include 'db.php';

// Fetch families and facilities
$familiesStmt = $pdo->query('SELECT id, family_name FROM families');
$facilitiesStmt = $pdo->query('SELECT id, name FROM facilities');

$families = $familiesStmt->fetchAll(PDO::FETCH_ASSOC);
$facilities = $facilitiesStmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $family_id = $_POST['family_id'];
    $facility_id = $_POST['facility_id'];
    $booking_date = $_POST['booking_date'];

    $stmt = $pdo->prepare('INSERT INTO bookings (family_id, facility_id, booking_date) VALUES (?, ?, ?)');
    $stmt->execute([$family_id, $facility_id, $booking_date]);

    echo "Facility booked successfully.";
}
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>رزرو امکانات</title> <!-- Translate title to Persian -->
    <link rel="stylesheet" href="style.css"> <!-- Linking style.css -->
</head>
<body>
    <h1>رزرو امکانات</h1> <!-- Translate heading to Persian -->
    <form method="post">
        <label for="family_id">انتخاب خانواده:</label> <!-- Translate label for family selection -->
        <select name="family_id" id="family_id" required>
            <?php foreach ($families as $family): ?>
                <option value="<?= $family['id'] ?>"><?= $family['family_name'] ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="facility_id">انتخاب امکانات:</label> <!-- Translate label for facility selection -->
        <select name="facility_id" id="facility_id" required>
            <?php foreach ($facilities as $facility): ?>
                <option value="<?= $facility['id'] ?>"><?= $facility['name'] ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="booking_date">تاریخ رزرو:</label> <!-- Translate label for booking date -->
        <input type="date" name="booking_date" id="booking_date" required><br><br>

        <button type="submit">رزرو امکانات</button> <!-- Translate button text to Persian -->
    </form>
                <a href="dashboard.php" class="float-button">&#127968;</a>

        <?php include 'footer.php'; ?>

</body>
</html>
