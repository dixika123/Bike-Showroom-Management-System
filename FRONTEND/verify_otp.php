<?php
include('../nav.php');
include('../config/constant.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $otp_entered = $_POST['otp'];

    // Retrieve user data from database based on OTP entered
    $sql = "SELECT Name, Email, Phone , BikeModel FROM testride WHERE otp = '$otp_entered'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // OTP verified successfully
        // Mark OTP as verified in the database
        $sql_update = "UPDATE testride SET otp_verified = 1 WHERE otp = '$otp_entered'";
        if ($conn->query($sql_update) === TRUE) {
            // Fetch user data
            $row = $result->fetch_assoc();
            $name = $row['Name'];
            $email = $row['Email'];
            $phone = $row['Phone'];
            $bikemodel = $row['BikeModel'];

           
            // Redirect to feedback form page with data in query parameters
            header("Location: feedback.php?name=" . urlencode($name) . "&email=" . urlencode($email) . "&phone=" . urlencode($phone). "&bikemodel=" . urlencode($bikemodel));
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "Invalid OTP. Please try again.";
    }
}


$conn->close();
?>


<!-- HTML content for OTP verification form -->
<div class="header1">
    <h1>OTP Verification</h1>
</div>

<div class="otp-verification">
    <form action="" method="post">
        <div class="row">
            <div class="col-25">
                <label for="otp">Enter OTP:</label>
            </div>
            <div class="col-75">
                <input type="text" name="otp" id="otp" placeholder="Enter OTP" required>
            </div>
        </div>
        <div class="row">
            <input type="submit" value="Verify OTP">
        </div>
    </form>
</div>

<?php
include('../footer.php');
?>