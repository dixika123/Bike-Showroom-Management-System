<?php
include('../config/constant.php');

if (isset($_GET['id'])) {
    $eid = $_GET['id'];
    
    // Fetch the existing enquiry details
    $query = "SELECT * FROM enquiry WHERE EID='$eid'";
    $result = mysqli_query($conn, $query);
    $enquiry = mysqli_fetch_assoc($result);
}

if (isset($_POST['submit'])) {
    $eid = $_POST['eid'];
    $followUpDetails = $_POST['followUpDetails'];
    
    // Insert follow-up details into the database
    $sql = "UPDATE enquiry SET FollowUpDetails='$followUpDetails', Status='Followed Up' WHERE EID='$eid'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "<script>
            alert('Follow-up details updated successfully');
            window.location.href = 'adminenquiry.php'; // Change this to the follow-up page URL
        </script>";
    } else {
        echo "Failed to update follow-up details";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Follow Up</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        height: 100vh;
    }

    h1 {
        color: maroon;
        text-align: center;
        margin-bottom: 20px;
    }

    form {
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        width: 100%;
    }

    form div {
        margin-bottom: 15px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
    }

    textarea {
        resize: vertical;
        height: 100px;
    }

    button {
        background-color: maroon;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        width: 100%;
    }

    button:hover {
        background-color: darkred;
    }
    </style>
</head>

<body>
    <h1>Follow Up Details</h1>
    <form action="" method="post">
        <input type="hidden" name="eid" value="<?php echo $enquiry['EID']; ?>">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" value="<?php echo $enquiry['Name']; ?>" disabled>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="text" id="email" value="<?php echo $enquiry['Email']; ?>" disabled>
        </div>
        <div>
            <label for="phone">Mobile No.:</label>
            <input type="text" id="phone" value="<?php echo $enquiry['MobileNo']; ?>" disabled>
        </div>
        <div>
            <label for="address">Address:</label>
            <input type="text" id="address" value="<?php echo $enquiry['Address']; ?>" disabled>
        </div>
        <div>
            <label for="occupation">Occupation:</label>
            <input type="text" id="occupation" value="<?php echo $enquiry['Occupation']; ?>" disabled>
        </div>
        <div>
            <label for="agegrp">Age Group:</label>
            <input type="text" id="agegrp" value="<?php echo $enquiry['AgeGroup']; ?>" disabled>
        </div>
        <div>
            <label for="bikemodel">Bike Model:</label>
            <input type="text" id="bikemodel" value="<?php echo $enquiry['BikeModel']; ?>" disabled>
        </div>
        <div>
            <label for="followUpDetails">Follow Up Details:</label>
            <textarea id="followUpDetails" name="followUpDetails" required></textarea>
        </div>
        <div>
            <button type="submit" name="submit">Submit</button>
        </div>
    </form>
</body>

</html>