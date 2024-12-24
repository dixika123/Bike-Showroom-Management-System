<?php
// Extract query parameters
$pidx = isset($_GET['pidx']) ? $_GET['pidx'] : '';
$amount = isset($_GET['amount']) ? $_GET['amount'] : '';
$status = isset($_GET['status']) ? $_GET['status'] : '';
$transaction_id = isset($_GET['transaction_id']) ? $_GET['transaction_id'] : '';
$purchase_order_id = isset($_GET['purchase_order_id']) ? $_GET['purchase_order_id'] : '';
$purchase_order_name = isset($_GET['purchase_order_name']) ? $_GET['purchase_order_name'] : '';
$mobile = isset($_GET['mobile']) ? $_GET['mobile'] : '';

// Redirect based on status
if ($status === 'Completed') {
    header("Location: psuccess.php?pidx=$pidx&amount=$amount&status=$status&transaction_id=$transaction_id&purchase_order_id=$purchase_order_id&purchase_order_name=$purchase_order_name&mobile=$mobile");
    exit;
} elseif ($status === 'User canceled') {
    header("Location: pcancel.php?pidx=$pidx&amount=$amount&status=$status&transaction_id=&purchase_order_id=$purchase_order_id&purchase_order_name=$purchase_order_name&mobile=");
    exit;
} else {
    echo "Error: Invalid status parameter.";
}
?>