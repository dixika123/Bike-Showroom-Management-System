<?php
require_once('../config/constant.php');

// Check if necessary query parameters are set in the URL
if (isset($_GET['pidx']) && isset($_GET['amount']) && isset($_GET['status'])) {
    // Assign the query parameters to variables
    $pidx = $_GET['pidx'];
    $amount = $_GET['amount'];
    $status = $_GET['status'];
    $transactionId = isset($_GET['transaction_id']) ? $_GET['transaction_id'] : '';
    $purchaseOrderId = isset($_GET['purchase_order_id']) ? $_GET['purchase_order_id'] : '';
    $purchaseOrderName = isset($_GET['purchase_order_name']) ? $_GET['purchase_order_name'] : '';
    $mobile = isset($_GET['mobile']) ? $_GET['mobile'] : '';

    // Prepare the SQL statement with parameterized query to prevent SQL injection
    $sql = "INSERT INTO payments (pidx, amount, status, transaction_id, purchase_order_id, purchase_order_name, mobile) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

            

    // Prepare and bind parameters
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssssss", $pidx, $amount, $status, $transactionId, $purchaseOrderId, $purchaseOrderName, $mobile);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        // Display success message and HTML response
        echo "
        <html>
        <head>
            <style>
                body {
                    text-align: center;
                    background-image: url('images/ps.png');
                    background-repeat: no-repeat;
                    background-position: center;
                    background-size: cover;
                }
                h1 {
                    color: green;
                    font-family: 'Nunito Sans', 'Helvetica Neue', 'sans-serif';
                    font-weight: 900;
                    font-size: 40px;
                    margin-bottom: 10px;
                }
                p {
                    color: black;
                    font-family: 'Nunito Sans', 'Helvetica Neue', 'sans-serif';
                    font-size: 20px;
                    margin: 0;
                }
                i {
                    color: white;
                    font-size: 100px;
                    line-height: 200px;
                    margin-left: -15px;
                }
                .card {
                    background: whitesmoke;
                    padding: 60px;
                    border-radius: 4px;
                    box-shadow: 0 2px 3px #C8D0D8;
                    display: inline-block;
                    margin-top: 100px;
                }
                #back {
                    width: 150px;
                    height: 40px;
                    background: maroon;
                    border: none;
                    margin-top: 10px;
                    margin-left: 65px;
                    font-size: 18px;
                }
                #back a {
                    text-decoration: none;
                    color: white;
                    font-weight: bold;
                }
                .ba {
                    width: 1px;
                }
            </style>
        </head>
        <body>
            <div class='card'>
                <div style='border-radius:200px; height:200px; width:200px; background: maroon; margin:0 auto;'>
                    <i class='checkmark'>✓</i>
                </div>
                <h1>Success</h1>
                <p>We have received your order request.<br />We'll be in touch shortly!</p>
                <div class='ba'><button id='back'><a href='../FRONTEND/Dashboard.php'>Search More</a></button></div>
            </div>
        </body>
        </html>";
    } else {
        // Display error if insertion fails
        echo "Error: " . mysqli_error($conn);
    }

    // Close statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    echo "Error: Missing necessary query parameters.";
}
?>