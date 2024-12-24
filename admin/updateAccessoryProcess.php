<?php
require_once('../config/constant.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $AID = $_POST['AID'];
    $accessory_name = mysqli_real_escape_string($conn, $_POST['accessory_name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $available = mysqli_real_escape_string($conn, $_POST['available']);

    // Ensure available field is either 'Y' or 'N'
    $available = ($available == 'Y' || $available == 'N') ? $available : 'N';

    // Image upload handling
    if(isset($_FILES['accessory_image']) && $_FILES['accessory_image']['name'] != ""){
        $target_dir = "../images/";
        $target_file = $target_dir . basename($_FILES["accessory_image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is an actual image or fake image
        $check = getimagesize($_FILES["accessory_image"]["tmp_name"]);
        if($check !== false) {
            if(move_uploaded_file($_FILES["accessory_image"]["tmp_name"], $target_file)){
                $accessory_image = basename($_FILES["accessory_image"]["name"]);
            } else {
                echo "Sorry, there was an error uploading your file.";
                exit;
            }
        } else {
            echo "File is not an image.";
            exit;
        }

        // Update query with image
        $query = "UPDATE accessories SET accessory_name='$accessory_name', price='$price', available='$available', accessory_image='$accessory_image' WHERE AID='$AID'";
    } else {
        // Update query without image
        $query = "UPDATE accessories SET accessory_name='$accessory_name', price='$price', available='$available' WHERE AID='$AID'";
    }

    if(mysqli_query($conn, $query)){
        echo "Accessory updated successfully!";
        header('Location: accessory.php');
        exit(); // Make sure to stop further execution after redirection
    } else {
        echo "Error updating accessory: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>