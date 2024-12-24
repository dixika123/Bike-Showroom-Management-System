<?php
include('../config/constant.php');

// Validate if OID is provided
if (!isset($_GET['OID'])) {
    die("Order ID is missing.");
}

$order_id = mysqli_real_escape_string($conn, $_GET['OID']);

// Fetch order details
$query = "SELECT * FROM accessories_order WHERE OID = '$order_id'";
$result = mysqli_query($conn, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    die("Order not found.");
}

$order = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Payment Page</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        background-color: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
        text-align: center;
    }

    h1 {
        font-size: 24px;
        color: #333;
        margin-bottom: 20px;
    }

    p {
        font-size: 16px;
        color: #666;
        margin-bottom: 20px;
    }

    form {
        margin-top: 20px;
    }

    label {
        font-size: 14px;
        color: #333;
        margin-bottom: 10px;
        display: block;
    }

    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 4px;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    button:hover {
        background-color: #45a049;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>Payment for Order #<?php echo $order['OID']; ?></h1>
        <p>Name: <?php echo $order['Name']; ?></p>
        <p>Phone: <?php echo $order['phone']; ?></p>
        <p>Total Amount: Rs. <?php echo $order['total_amount']; ?></p>
        <form method="post" action="payment_process.php">
            <input type="hidden" name="OID" value="<?php echo $order['OID']; ?>">
            <label for="payment_method">Select Payment Method:</label>
            <select id="payment_method" name="payment_method">
                <option value="credit_card">Credit Card</option>
                <option value="debit_card">Debit Card</option>
                <option value="net_banking">Net Banking</option>
            </select>
            <button type="submit">Pay Now</button>
        </form>
    </div>
</body>

</html>