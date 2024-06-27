<?php
include 'db.php';

$stmt = $pdo->query('SELECT bookings.*, families.family_name, facilities.name AS facility_name FROM bookings JOIN families ON bookings.family_id = families.id JOIN facilities ON bookings.facility_id = facilities.id ORDER BY booking_date DESC');
$bookings = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl"> <!-- Setting the language to Persian (fa) -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مشاهده رزروها</title> <!-- Translate title to Persian -->
    <link rel="stylesheet" href="style.css"> <!-- Linking style.css -->
</head>
<body>
    <h1>رزروها</h1> <!-- Translate heading to Persian -->
    <table>
        <tr>
            <th>خانواده</th> <!-- Translate table headers to Persian -->
            <th>امکانات</th>
            <th>تاریخ رزرو</th>
        </tr>
        <?php foreach ($bookings as $booking): ?>
        <tr>
            <td><?= htmlspecialchars($booking['family_name']) ?></td>
            <td><?= htmlspecialchars($booking['facility_name']) ?></td>
            <td><?= htmlspecialchars($booking['booking_date']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
                <a href="dashboard.php" class="float-button">&#127968;</a>

        <?php include 'footer.php'; ?>

</body>
</html>
