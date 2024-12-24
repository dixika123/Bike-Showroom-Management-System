<?php
require_once('../config/constant.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $BikeID = $_POST['BikeID'];
    $Model = mysqli_real_escape_string($conn, $_POST['Model']);
    $Price = mysqli_real_escape_string($conn, $_POST['Price']);
    $Mileage = mysqli_real_escape_string($conn, $_POST['Mileage']);
    $Descriptions = mysqli_real_escape_string($conn, $_POST['Descriptions']);
    $Available = mysqli_real_escape_string($conn, $_POST['Available']);

    // Image upload handling
    if(isset($_FILES['Bikeimage']) && $_FILES['Bikeimage']['name'] != ""){
        $target_dir = "../images/";
        $target_file = $target_dir . basename($_FILES["Bikeimage"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is an actual image or fake image
        $check = getimagesize($_FILES["Bikeimage"]["tmp_name"]);
        if($check !== false) {
            if(move_uploaded_file($_FILES["Bikeimage"]["tmp_name"], $target_file)){
                $Bikeimage = basename($_FILES["Bikeimage"]["name"]);
            } else {
                echo "Sorry, there was an error uploading your file.";
                exit;
            }
        } else {
            echo "File is not an image.";
            exit;
        }

        // Update query with image
        $query = "UPDATE bikes SET Model='$Model', Price='$Price', Mileage='$Mileage', Descriptions='$Descriptions', Available='$Available', Bikeimage='$Bikeimage' WHERE BikeID='$BikeID'";
    } else {
        // Update query without image
        $query = "UPDATE bikes SET Model='$Model', Price='$Price', Mileage='$Mileage', Descriptions='$Descriptions', Available='$Available' WHERE BikeID='$BikeID'";
    }

    if(mysqli_query($conn, $query)){
        echo "Bike updated successfully!";
        header('Location: bike.php');
    } else {
        echo "Error updating bike: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>