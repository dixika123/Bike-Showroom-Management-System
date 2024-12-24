<?php
require '../vendor/autoload.php';
include('../nav.php');
include('../config/constant.php');
include('userclass.php');
?>


<?php
// sandip
$sql = "SELECT DISTINCT Model FROM bikes ORDER BY Model";
$result = mysqli_query($conn, $sql);

$models = array();
while ($row = mysqli_fetch_assoc($result)) {
    $models[] = $row['Model'];
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// ini_set('SMTP', 'smtp.example.com');
// ini_set('smtp_port', 587);

// Function to send email
function sendEmail($to, $subject, $message)
{
    try {
        
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'dixika1000@gmail.com';
        $mail->Password = 'diomrhuxxhhdusez';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('dixika1000@gmail.com', 'Dixika Shrestha');
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->send();
        return true;
    } catch (\Exception $e) {
        echo $mail->ErrorInfo;
        return false;
    } catch (\Error $err) {
        echo $err->getMessage();
        return false;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['Name'];
    $phone = $_POST['Phone'];
    $email = $_POST['Email'];
    $address = $_POST['address'];
    $licence = $_POST['LicenceNo'];
    $bikemodel = $_POST['BikeModel'];
    $date = $_POST['TRDate'];
    $time = $_POST['TRTime'];

    // Basic validation
    if (empty($name) || empty($phone) || empty($email) || empty($address) || empty($licence) || empty($bikemodel) || empty($date) || empty($time)|| empty($_FILES['image']['name'])) {
        echo '<script>alert("ALL FIELDS ARE REQUIRED")</script>';
        echo '<script> window.location.href = "testride.php";</script>';
        exit;
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Validate phone number (basic validation for numeric values and length)
    if (!preg_match('/^[0-9]{10}$/', $phone)) {
        echo '<script>alert("Invalid mobile number format. Please use 98XXXXXXXX format.");</script>';
        echo '<script>window.location.href = "aftertestride.php";</script>';
        exit;
    }

     // Validate LicenceNo format using regex
     if (!preg_match('/^[A-Z]{2}-[0-9]{4}-[0-9]{3}$/', $licence)) {
        echo '<script>alert("Invalid Licence number format. Please use XX-XXXX-XXX format.");</script>';
        echo '<script>window.location.href = "aftertestride.php";</script>';
        exit;
    }

    // Generate OTP
    $otp = rand(100000, 999999);
 // File upload handling
 $target_dir = "../images/";
 $img_name = basename($_FILES["image"]["name"]);
 $target_file = $target_dir . $img_name;
 $uploadOk = 1;
 $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

 // Check if image file is a actual image or fake image
 $check = getimagesize($_FILES["image"]["tmp_name"]);
 if ($check === false) {
     echo "File is not an image.";
     exit;
 }

 // Check if file already exists
 if (file_exists($target_file)) {
     echo "Sorry, file already exists.";
     exit;
 }

 // Check file size
 if ($_FILES["image"]["size"] > 500000) { // Adjust as per your requirements
     echo "Sorry, your file is too large.";
     exit;
 }

 // Allow certain file formats
 if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
     && $imageFileType != "gif") {
     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
     exit;
 }

 // Upload file
 if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
     echo "Sorry, there was an error uploading your file.";
     exit;
 }


    // Insert user data and OTP into the database
    // to filter the bike model according to the email address
    $select_query = "SELECT * FROM testride WHERE Email = '$email' AND BikeModel = '$bikemodel'";
    // echo $select_query;die;
    $query_run = $conn->query($select_query);
    if ($query_run->num_rows > 1) {
        echo "Please check bike model and try agin.";
        exit;
    }
    // completed
    // echo 'a';die;
    $fetch=new testride($conn);
    $res=$fetch->getTestride($name, $phone, $email, $address, $licence, $img_name, $bikemodel, $date, $time, $otp);
    
// echo $otp;die;
    if ($res === TRUE) {
        // Send OTP to mobile
        // You can use an SMS gateway API to send OTP to the provided mobile number
        // Send OTP to email
        $to = $email;
        $subject = "Test Ride OTP";
        $message = "Your OTP for test ride registration is: $otp";
        // Set SMTP configuration using ini_set()
        //  ini_set('SMTP', 'smtp.gmail.com');
        //  ini_set('smtp_port', 587);
        if (sendEmail($to, $subject, $message)) {
            
            // Redirect to OTP verification page
            // echo $otp ;
            // die;
            header("Location: verify_otp.php");
            exit();
        } else {
            echo "Error sending email.";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


// $conn->close();
?>


<!-- middle body -->


<div class="header1">
    <h1>TEST RIDE FORM</h1>
    <!-- <h3><p>Inherit the Authenticity of a LEGEND</p></h3> -->

    <!-- Test ride form -->
</div>

<div class="testride">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-25">
                <label for="fname">Name:</label>
            </div>
            <div class="col-75">
                <input type="text" name="Name" id="name" placeholder="Enter your name">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="phone">Phone:</label>
            </div>
            <div class="col-75">
                <input type="text" name="Phone" id="phone" placeholder="Enter your phone number">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="email">Email:</label>
            </div>
            <div class="col-75">
                <input type="text" name="Email" id="email" placeholder="Enter your email">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="email">Address:</label>
            </div>
            <div class="col-75">
                <input type="text" name="address" id="address" placeholder="Enter your Address">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="LicenceNo.">Driving Licence No.:</label>
            </div>
            <div class="col-75">
                <input type="text" name="image" id="image">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="LicenceNo.">Driving Licence No.:</label>
            </div>
            <div class="col-75">
                <input type="file" name="" id="licence" placeholder="AB-XXXX-XXX">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="bikemodel">Bike Model:</label>
            </div>
            <div class="col-75">
                <select id="bikemodel" name="BikeModel">
                    <!-- <option value="Jawa 350">Jawa 350</option>
                    <option value="Jawa 42">Jawa 42</option>
                    <option value="Perak">Perak</option>
                    <option value="Scrambler">Scrambler</option>
                    <option value="Roadster">Roadster</option>
                    <option value="Adventure">Adventure</option> -->
                    <!-- sandio -->
                    <?php foreach ($models as $model) { ?>
                    <option value="<?php echo htmlspecialchars($model); ?>"><?php echo htmlspecialchars($model); ?>
                    </option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="date">Test Ride Date:</label>
            </div>
            <div class="col-75">
                <input type="date" name="TRDate" id="datefield">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="time">Test Ride Time:</label>
            </div>
            <div class="col-75">
                <input type="time" name="TRTime" id="time">
            </div>
        </div>
        <div class="disclaimer">
            <h3>Disclaimer: </h3> In consideration for AGNI MOTOINC PVT. LTD (the seller)
            permitting me to test ride JAWA BIKES, I hereby declare that:
            <br>

            1. I completely understand the risks of riding the bike on road. <br>
            2. I agree to hold the seller harmless for any injuries incurred to me. <br>
            3. I agree to take full responsibility for any ideemnify the seller in full with respect to any and
            all claims of whatever nature,
            including particularly (but not limited to) all claims of traffic violation, property damage,
            personal injury, death or consequential loss or damage
            arising out of any unfortunate incident during my test riding of the motorcycle made available by
            the seller.</p>
        </div>
        <div class="row">
            <input type="submit" name="" id="" value="submit">
        </div>
    </form>
</div>
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