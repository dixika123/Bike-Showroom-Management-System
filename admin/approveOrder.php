<?php
// Include the file with constant definitions
include('../config/constant.php');


    $oid = $_GET['oid'];
    $query = "UPDATE accessories_order SET status = 'APPROVED' WHERE OID = '$oid'";
    $result = mysqli_query($conn, $query);
    if($result) {
        echo '<script>alert("Order approved successfully")</script>';
        echo '<script>window.location.href = "order1.php";</script>';
    } else {
        echo '<script>alert("Failed to approve order")</script>';
    }
// Close the connection
mysqli_close($conn);
?>