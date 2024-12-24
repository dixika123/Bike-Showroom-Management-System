<?php
require_once('../config/constant.php');

if(isset($_GET['id'])){
    $bikeID = $_GET['id'];
    
    // Fetch bike details based on the ID
    $query = "SELECT * FROM bikes WHERE BikeID = $bikeID";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){
        $bike = mysqli_fetch_assoc($result);
    } else {
        echo "Bike not found.";
        exit;
    }
} else {
    echo "No bike ID provided.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Bike</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .update-form-container {
        background-color: maroon;
        color: white;
        padding: 20px;
        border: 2px solid white;
        border-radius: 10px;
        width: 400px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .update-form-container h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    .update-form-container label {
        display: block;
        margin-bottom: 5px;
    }

    .update-form-container input,
    .update-form-container select,
    .update-form-container textarea,
    .update-form-container button {
        width: 100%;
        padding: 5px;
        margin-bottom: 15px;
        border: none;
        border-radius: 5px;
    }

    .update-form-container input,
    .update-form-container select,
    .update-form-container textarea {
        background-color: white;
        color: black;
    }

    .update-form-container button {
        background-color: white;
        color: maroon;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .update-form-container button:hover {
        background-color: green;
        color: white;
    }

    .update-form-container .cancel-button {
        background-color: white;
        color: maroon;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s;
        margin-top: -10px;
        margin-bottom: 15px;
    }

    .update-form-container .cancel-button a {
        text-decoration: none;
        color: maroon;
        display: block;
        width: 100%;
        text-align: center;
    }

    .update-form-container .cancel-button:hover {
        background-color: lightgray;
    }
    </style>
</head>

<body>
    <div class="update-form-container">
        <h1>Update Bike Details</h1>
        <form action="updateBikeProcess.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="BikeID" value="<?php echo $bike['BikeID']; ?>">
            <label for="Model">Model:</label>
            <input type="text" name="Model" value="<?php echo $bike['Model']; ?>" required><br>

            <label for="Price">Price:</label>
            <input type="number" name="Price" value="<?php echo $bike['Price']; ?>" required><br>

            <label for="Mileage">Mileage:</label>
            <input type="text" name="Mileage" value="<?php echo $bike['Mileage']; ?>" required><br>

            <label for="Descriptions">Descriptions:</label>
            <textarea name="Descriptions" required><?php echo $bike['Descriptions']; ?></textarea><br>

            <label for="Available">Available:</label>
            <select name="Available" required>
                <option value="Y" <?php echo $bike['Available'] == 'Y' ? 'selected' : ''; ?>>Yes</option>
                <option value="N" <?php echo $bike['Available'] == 'N' ? 'selected' : ''; ?>>No</option>
            </select><br>

            <label for="Bikeimage">Bike Image:</label>
            <input type="file" name="Bikeimage"><br>

            <button type="submit">Update Bike</button>
        </form>
        <button class="cancel-button"><a href="bike.php">Cancel</a></button>
    </div>
</body>

</html>