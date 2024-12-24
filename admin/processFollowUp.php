<?php
include('../config/constant.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enquiry_id = $_POST['EID'];
    $name = $_POST['name'];
    $number = $_POST['number'];
    $messages = $_POST['messages'];
    $bike_model = $_POST['bike_model'];

    // Update status to "COMPLETED" in the database
    $sql = "UPDATE enquiry SET Status = 'COMPLETED' WHERE EID = $enquiry_id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Now, you can insert the follow-up details into another table or perform other necessary actions
        // For example:
        $insert_sql = "INSERT INTO follow_up_details (EID, name, number, messages, bike_model) VALUES ('$enquiry_id', '$name', '$number', '$messages', '$bike_model')";
        $insert_result = mysqli_query($conn, $insert_sql);

        if ($insert_result) {
            // Redirect back to the original page
            header("Location: adminenquiry.php");
            exit();
        } else {
            echo "Error inserting follow-up details: " . mysqli_error($conn);
        }
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request!";
}
?>