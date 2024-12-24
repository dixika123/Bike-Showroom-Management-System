<?php
require_once('../config/constant.php');

// Check if necessary query parameters are set
if (isset($_GET['pidx']) && isset($_GET['amount']) && isset($_GET['status']) && isset($_GET['purchase_order_id']) && isset($_GET['purchase_order_name'])) {
    $pidx = $_GET['pidx'];
    $amount = $_GET['amount'];
    $status = $_GET['status'];
    $purchase_order_id = $_GET['purchase_order_id'];
    $purchase_order_name = $_GET['purchase_order_name'];

    // Save cancellation details to the database
    $sql = "INSERT INTO payments (pidx, amount, status, transaction_id, purchase_order_id, purchase_order_name, mobile) VALUES ('$pidx', '$amount', '$status', NULL, '$purchase_order_id', '$purchase_order_name', NULL)";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Redirect back to the main booking page
        
echo '<script>alert("ORDER CANCELLED")</script>';
echo '<script> window.location.href = "../FRONTEND/bookingIndex.php";</script>';
     
        exit;
    } else {
        echo "Error: Could not save cancellation details.";
    }
} else {
    echo "Error: Missing necessary query parameters.";
}
?>