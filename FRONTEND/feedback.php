<?php
include('../nav.php');
include('../config/constant.php');
include('userclass.php');

?>


<?php
 if (isset($_GET['name']) && isset($_GET['email']) && isset($_GET['phone']) && isset($_GET['bikemodel'])) {
     $name = $_GET['name'];
     $email = $_GET['email'];
     $phone = $_GET['phone'];
     $bikemodel = $_GET['bikemodel'];
 }

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect feedback data
    $name = $_POST['Name'];
    $bikemodel = $_POST['BikeModel'];
    $phone = $_POST['Phone'];
    $email = $_POST['Email'];
    $date = $_POST['date'];
    $style = $_POST['style'];
    $comfort = $_POST['comfort'];
    $power = $_POST['power'];
    $suspension = $_POST['suspension'];
    $overall = $_POST['overall'];
    $experience = $_POST['experience'];
    $otp = $_POST['otp'];

    $sql_otp = "SELECT otp FROM testride WHERE Email = '$email' AND BikeModel = '$bikemodel'";

    $result = $conn->query($sql_otp);

    if ($result->num_rows > 0) {
        // OTP is valid, proceed with feedback submission
        $row = $result->fetch_assoc();
        $storedOTP = $row['otp'];
       

        // echo 'otp=' . $otp;
        // echo 'stored otp=' . $storedOTP;
        // die;

        // Compare the OTP entered by the user with the one stored in the testride table
        if ($otp == $storedOTP) {
            // Insert feedback data into the database
            $user_id = $_SESSION['id'];
            $fetch = new feedback($conn);
            $query = $fetch->getFeedback($name, $bikemodel,$phone, $email, $date, $style, $comfort, $power, $suspension, $overall, $experience,$otp,$user_id);
            if ($query === TRUE) {
                echo "Feedback submitted successfully.";
                $sql = " SELECT  BikeModel, COUNT(BikeModel) AS review_count,
                AVG((style + comfort + power + suspension + overall) / 5) AS avg_rating
                FROM feedback
                Where user_id =  $user_id
                GROUP BY BikeModel
                ORDER BY avg_rating DESC, review_count DESC";
        
                // $sqlother = " SELECT  BikeModel, COUNT(BikeModel) AS review_count,
                // AVG((style + comfort + power + suspension + overall) / 5) AS avg_rating
                // FROM feedback
                // Where user_id !=  $user_id
                // GROUP BY BikeModel
                // ORDER BY avg_rating DESC, review_count DESC";

                    $result = $conn->query($sql);
    // $resultother = $conn->query($sqlother);
    $htmlContent = "";
    $htmlContentother = "";

if ($result->num_rows > 0) {
    $htmlContent .= "<h2>Top recommended bikes:</h2>";
    $htmlContent .= "<ul>";
    while ($row = $result->fetch_assoc()) {
        $htmlContent .= "<li>" . $row["BikeModel"] . " with " . $row["review_count"] . " reviews and an average rating of " . number_format($row["avg_rating"], 2) . "</li>";
    }
    $htmlContent .= "</ul>";
} else {
    $htmlContent .= "<p>No bikes found in the database.</p>";
}

// if ($resultother->num_rows > 0) {
//     $htmlContentother .= "<h2>Top recommended bikes By others:</h2>";
//     $htmlContentother .= "<ul>";
//     while ($row = $resultother->fetch_assoc()) {
//         $htmlContentother .= "<li>" . $row["BikeModel"] . " with " . $row["review_count"] . " reviews and an average rating of " . number_format($row["avg_rating"], 2) . "</li>";
//     }
//     $htmlContentother .= "</ul>";
// } else {
//     $htmlContentother .= "<p>No bikes found in the database.</p>";
// }

            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Invalid OTP. Please enter the correct OTP.";
        }
    } else {
        echo "Error: No test ride record found for this email address.";
    }
}
?>

<!-- middle body -->
<p id="currentTime"></p>

<div class="header1">
    <!-- <h1>JAWA Yezdi Motorcycles</h1> -->
    <h1>CUSTOMERS FEEDBACK FORM</h1>
    <p>
        Dear Customer, <br>
        Thank you for choosing JAWA Yezdi Motorcycles and test riding our motorcycles. <br>
        Your visit is a motivation for us. Kindly help us by letting us know about your experience on your ride.
    </p>
    <br>

    <form action="feedback.php" method="post">
        <div class="box">
            <div class="box1">
                <label for="fname">Name:</label>
            </div>
            <div class="box2">
                <input type="text" readonly name="Name" id="name" placeholder="Enter your name"
                    value="<?php echo isset($name) ? $name : ''; ?>">
            </div>
        </div>

        <div class="box">
            <div class="box1">
                <label for="bike">Bike Model:</label>
            </div>
            <div class="box2">
                <input type="text" readonly name="BikeModel" id="name"
                    value="<?php echo isset($bikemodel) ? $bikemodel : ''; ?>"
                    placeholder="Enter the model you had test ride.">
            </div>
        </div>

        <div class="box">
            <div class="box1">
                <label for="phone">Phone:</label>
            </div>
            <div class="box2">
                <input type="text" readonly name="Phone" id="phone" value="<?php echo isset($phone) ? $phone : ''; ?>"
                    placeholder="Enter your phone number">
            </div>
        </div>

        <div class="box">
            <div class="box1">
                <label for="email">Email:</label>
            </div>
            <div class="box2">
                <input type="email" name="Email" readonly id="email" value="<?php echo isset($email) ? $email : ''; ?>"
                    placeholder="Enter your email">
            </div>
        </div>

        <div class="box">
            <div class="box1">
                <label for="date">Date:</label>
            </div>
            <div class="box2">
                <input type="date" name="date" id="datefield">
            </div>
        </div>

        <br>
        <p> How satisfied are you with each of the aspect of the following of your ride experience?<br>
            Please rank by marking tick in the box that truly reflects your satisfaction level.</p> <br>
        <table border="1">
            <th> </th>
            <th>EXCELLENT</th>
            <th>GOOD</th>
            <th>FAIR</th>
            <th>POOR</th>
            <tr>
                <td>Style & Look - World Class</td>
                <td><input type="radio" name="style" id="1" class="p1" value="4" required></td>
                <td><input type="radio" name="style" id="1" class="p1" value="3" required></td>
                <td><input type="radio" name="style" id="1" class="p1" value="2" required></td>
                <td><input type="radio" name="style" id="1" class="p1" value="1" required></td>

            </tr>
            <tr>
                <td>Seating Comfort</td>
                <td><input type="radio" name="comfort" id="2" class="p2" value="4" required></td>
                <td><input type="radio" name="comfort" id="2" class="p2" value="3" required></td>
                <td><input type="radio" name="comfort" id="2" class="p2" value="2" required></td>
                <td><input type="radio" name="comfort" id="2" class="p2" value="1" required></td>

            </tr>

            <tr>
                <td>Pick Up & Power</td>
                <td><input type="radio" name="power" id="3" class="p3" value="4" required></td>
                <td><input type="radio" name="power" id="3" class="p3" value="3" required></td>
                <td><input type="radio" name="power" id="3" class="p3" value="2" required></td>
                <td><input type="radio" name="power" id="3" class="p3" value="1" required></td>

            </tr>

            <tr>
                <td>Smooth Suspension</td>
                <td><input type="radio" name="suspension" id="4" class="p5" value="4" required></td>
                <td><input type="radio" name="suspension" id="4" class="p5" value="3" required></td>
                <td><input type="radio" name="suspension" id="4" class="p5" value="2" required></td>
                <td><input type="radio" name="suspension" id="4" class="p5" value="1" required></td>

            </tr>

            <tr>
                <td>Overall Feel</td>
                <td><input type="radio" name="overall" id="4" class="p5" value="4" required></td>
                <td><input type="radio" name="overall" id="4" class="p5" value="good" required></td>
                <td><input type="radio" name="overall" id="4" class="p5" value="fair" required></td>
                <td><input type="radio" name="overall" id="4" class="p5" value="1" required></td>

            </tr>
        </table>
        <br>
        <p class="box"> Share your overall Experience:
            <input type="textarea" cols="15" rows="25" name="experience">
        </p> <br>
        <div class="box">
            <div class="box1">
                <label for="otp">OTP:</label>
            </div>
            <div class="box2">
                <input type="text" name="otp" id="otp" placeholder="Enter otp code" required>
            </div>
        </div>

        <br>
        <div class="box">
            <input type="submit" name="" id="" value="submit">
        </div>
        <div class="recommendation">
            <?php if (isset($htmlContent)) : ?>
            <h2>Bike Recommendation</h2>
            <p><?php echo $htmlContent; ?></p>
            <?php endif; ?>


        </div>
    </form>
    <div class=" recommendation">
        <?php if (isset($htmlContentother)) : ?>
        <!-- <h2>Other People Bike Recommendation:</h2> -->
        <p><?php echo $htmlContentother; ?></p>
        <?php endif; ?>


    </div>
</div>
</form>
</div>

<?php
if (isset($_POST['submit'])) {
    $check = $_POST['submit'];
    echo "Bike1";
}
?>




<script>
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();
if (dd < 10) {
    dd = '0' + dd
}
if (mm < 10) {
    mm = '0' + mm
}

today = yyyy + '-' + mm + '-' + dd;
document.getElementById("datefield").setAttribute("min", today);
// document.getElementById("datefield").setAttribute("max", today);
</script>
<script>
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();
if (dd < 10) {
    dd = '0' + dd
}
if (mm < 10) {
    mm = '0' + mm
}

today = yyyy + '-' + mm + '-' + dd;
document.getElementById("dfield").setAttribute("min", today);
</script>
<?php
include('../footer.php');
?>