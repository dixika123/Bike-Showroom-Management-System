<?php
require_once('../config/constant.php');

if(isset($_GET['id'])){
    $aID = $_GET['id'];
    
    // Fetch bike details based on the ID
    $query = "SELECT * FROM accessories WHERE AID = $aID";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){
        $accessory = mysqli_fetch_assoc($result);
    } else {
        echo "Accessory not found.";
        exit;
    }
} else {
    echo "No Accessory ID provided.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Accessory</title>
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
        <h1>Update Accessory Details</h1>
        <form action="updateAccessoryProcess.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="AID" value="<?php echo $accessory['AID']; ?>">
            <label for="Model">Accessory Name:</label>
            <input type="text" name="accessory_name" value="<?php echo $accessory['accessory_name']; ?>" required><br>

            <label for="Price">Price:</label>
            <input type="number" name="price" value="<?php echo $accessory['price']; ?>" required><br>

            <label for="Available">Available:</label>
            <select name="Available" required>
                <option value="Y" <?php echo $accessory['available'] == 'Y' ? 'selected' : ''; ?>>Yes</option>
                <option value="N" <?php echo $accessory['available'] == 'N' ? 'selected' : ''; ?>>No</option>
            </select><br>

            <label for="accessory_image">Accessory Image:</label>
            <input type="file" name="accessory_image"><br>

            <button type="submit">Update Accessory</button>
        </form>
        <button class="cancel-button"><a href="accessory.php">Cancel</a></button>
    </div>
</body>

</html>