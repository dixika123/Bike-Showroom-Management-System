<?php
session_start();
if (!isset($_SESSION['booking_details'])) {
    header("Location: ../admin/bookings.php");
    exit();
}
$booking = $_SESSION['booking_details'];
unset($_SESSION['booking_details']);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Booking Successful</title>
</head>

<body>
    <h2>Booking Successful</h2>
    <p>Thank you, <?php echo $booking['customer_name']; ?>. Your booking for <?php echo $booking['bike_id']; ?> on
        <?php echo $booking['date']; ?> has been confirmed.</p>
    <p><a href="index.php">Go back to home page</a></p>
</body>

</html>