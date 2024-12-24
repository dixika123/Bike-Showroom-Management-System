<?php
require_once('../config/constant.php');
include('../FRONTEND/userclass.php');
// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    // Assign the value of 'id' parameter to $id variable
    $id = $_GET['id'];
} else {
    echo "Error: 'id' parameter not provided in the URL.";
    exit;
}

// Check if the 'source' parameter is set in the URL
if (isset($_GET['source'])) {
    // Assign the value of 'source' parameter to $source variable
    $source = $_GET['source'];
} else {
    echo "Error: 'source' parameter not provided in the URL.";
    exit;
}

// Initialize total
$total = 0;

if ($source == 'page1') {
    // Query for bike price

    
    $fetch = new payments($conn);
    $result = $fetch->getPayment($id);
    
    // $sql = "SELECT Price FROM bikes WHERE BikeID='$id'";
    // $result = mysqli_query($conn, $sql);

    // Check if the query was successful and if there are any results
    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the row from the result set
        $row = mysqli_fetch_assoc($result);
        // Assign the 'Price' value to $total
        $total = $row['Price'];
    } else {
        echo "Bike details not found.";
        exit;
    }
} elseif ($source == 'page2') {
    // Query for accessory price
    $sql = "SELECT Price FROM accessories WHERE AID='$id'";
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful and if there are any results
    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the row from the result set
        $row = mysqli_fetch_assoc($result);
        // Assign the 'Price' value to $total
        $total = $row['Price'];
    } else {
        echo "Accessories not found.";
        exit;
    }
} else {
    echo "Error: Invalid source parameter.";
    exit;
}

// Adjust $total based on the source parameter
if ($source == 'page1') {
    $total = intval($total);
} elseif ($source == 'page2') {
    $total = intval($total) * 100; // Example adjustment
} else {
    echo "Error: Invalid source parameter.";
    exit;
}

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://a.khalti.com/api/v2/epayment/initiate/',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => json_encode(array(
        "return_url" => "http://localhost/composer/admin/paymentHandler.php",
        "website_url" => "https://index.php",
        "amount" => $total, // pass $total directly as an integer
        "purchase_order_id" => "Order01",
        "purchase_order_name" => "test",
        "customer_info" => array(
            "name" => "Test Bahadur",
            "email" => "test@khalti.com",
            "phone" => "9800000001"
        )
    )),
    CURLOPT_HTTPHEADER => array(
        'Authorization: key live_secret_key_68791341fdd94846a146f0457ff7b455',
        'Content-Type: application/json',
    ),
));

$response = curl_exec($curl);

curl_close($curl);


// Decode the JSON response
$responseData = json_decode($response, true);
var_dump($responseData); // Check the structure of $responseData
if (isset($responseData['payment_url'])) {
    // Redirect the user to the payment URL
    header("Location: " . $responseData['payment_url']);
    exit; // Make sure to exit to prevent further execution
} else {
    echo "Error: Payment URL not found in the response.";

    
    // Handle this error scenario, log or display an appropriate message
}
if (isset($_GET['status'])) {
    $status = $_GET['status'];
    if ($status === 'Completed') {
        // Successful transaction
        $transaction_id = $_GET['transaction_id'];
        $purchase_order_id = $_GET['purchase_order_id'];
        $purchase_order_name = $_GET['purchase_order_name'];
        $amount = $_GET['amount'];
        
        // Redirect to psuccess.php with necessary query parameters
        header("Location: psuccess.php?pidx=" . $_GET['pidx'] . "&amount=" . $amount . "&status=" . $status . "&transaction_id=" . $transaction_id . "&purchase_order_id=" . $purchase_order_id . "&purchase_order_name=" . $purchase_order_name . "&mobile=" . $_GET['mobile']);
        exit;
    } elseif ($status === 'User canceled') {
        // Canceled transaction
        // Redirect to pcancel.php with necessary query parameters
        header("Location: pcancel.php?pidx=" . $_GET['pidx'] . "&amount=" . $_GET['amount'] . "&status=" . $status . "&transaction_id=&purchase_order_id=" . $_GET['purchase_order_id'] . "&purchase_order_name=" . $_GET['purchase_order_name'] . "&mobile=");
        exit;
    } else {
        echo "Unknown status: " . $status;
    }
} else {
    echo "Error: 'status' parameter not provided in the URL.";
}

?>