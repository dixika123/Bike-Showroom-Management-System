<?php
include('config/constant.php');
include('FRONTEND/userclass.php');
// session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    echo '<script>alert("You need to log in first."); window.location.href = "loginform.php";</script>';
    exit;
}
// Get the user ID from the email stored in the session
$email = $_SESSION['email'];
$sql = "SELECT `id` FROM `jawauser` WHERE Email='$email'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['id'];
} else {
    echo '<script>alert("User not found."); window.location.href = "loginform.php";</script>';
    exit;
}
$fetch = new jawauser($conn);
$user = $fetch->getUserById($user_id);

// Handle form submission
if (isset($_POST['update'])) {
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $lic = mysqli_real_escape_string($conn, $_POST['lic']);
    $ph = mysqli_real_escape_string($conn, $_POST['ph']);

    if (empty($fname) || empty($lname) || empty($email) || empty($lic) || empty($ph)) {
        echo '<script>alert("Please fill all the fields.")</script>';
    } else {
        $result = $fetch->updateProfile($user_id, $fname, $lname, $email, $ph, $lic);
        if ($result) {
            echo '<script>alert("Profile updated successfully."); window.location.href = "FRONTEND/Dashboard.php";</script>';
        } else {
            echo '<script>alert("Error updating profile. Please try again.")</script>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="css/regs.css">
    <style>
    /* General Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .main {
        background: #fff;
        width: 400px;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: maroon;
        margin-bottom: 20px;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    label {
        font-size: 16px;
        color: #333;
        margin-bottom: 8px;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="password"] {
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
        width: calc(100% - 22px);
        /* Adjusted width */
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="tel"]:focus,
    input[type="password"]:focus {
        border-color: maroon;
    }

    input[type="submit"] {
        background-color: maroon;
        color: white;
        /* padding: 2px 12px; */
        /* Adjusted padding for better button appearance */
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        width: 80%;
        /* Full width */
        text-align: center;
        justify-content: center;
        /* Center text horizontally */
        /* display: inline-block; */
        /* Ensure inline block for proper padding and margin */
    }

    input[type="submit"]:hover {
        background-color: #b30000;
    }

    #back {
        text-align: center;
        margin-bottom: 20px;
    }

    #back a {
        text-decoration: none;
        color: white;
        background-color: maroon;
        padding: 10px 20px;
        border-radius: 5px;
        display: inline-block;
        transition: background-color 0.3s ease;
    }

    #back a:hover {
        background-color: #b30000;
    }
    </style>

</head>

<body>
    <div class="main">
        <button id="back"><a href="FRONTEND/Dashboard.php">Dashboard</a></button>
        <div class="register">
            <h2>Edit Profile</h2>
            <form id="editProfile" action="edit_profile.php" method="POST">
                <label for="fname">First Name:</label>
                <input type="text" name="fname" id="fname" value="<?php echo htmlspecialchars($user['FName']); ?>"
                    required>
                <label for="lname">Last Name:</label>
                <input type="text" name="lname" id="lname" value="<?php echo htmlspecialchars($user['LName']); ?>"
                    required>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($user['Email']); ?>"
                    required>
                <label for="ph">Phone Number:</label>
                <input type="tel" name="ph" id="ph" maxlength="10"
                    value="<?php echo htmlspecialchars($user['Phone']); ?>" required>
                <label for="lic">License Number:</label>
                <input type="text" name="lic" id="lic" value="<?php echo htmlspecialchars($user['LicenceNo']); ?>"
                    required>
                <input type="submit" class="btnn" value="Update Profile" name="update">
            </form>
        </div>
    </div>
</body>

</html>