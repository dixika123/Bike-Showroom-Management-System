<?php
require_once('../config/constant.php');
include('../FRONTEND/userclass.php');
// print_r($_SESSION);die;
$id=$_GET['id'];
// echo $id;die;
if(empty($_SESSION['email'])){
    
    header('location:../loginform.php?id='.$id);
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOKING</title>
    <!-- <link  rel="stylesheet" href=""> -->
    <script type="text/javascript">
    function preventBack() {
        window.history.forward();
    }

    setTimeout("preventBack()", 0);

    window.onunload = function() {
        null
    };
    </script>



</head>

<body>
    <style>
    * {
        margin: 0;
        padding: 0;

    }

    div.main {
        width: 400px;
        margin: 100px auto 0px auto;
    }

    .btnn {
        width: 240px;
        height: 40px;
        background: maroon;
        border: none;
        margin-top: 30px;
        margin-left: 30px;
        font-size: 18px;
        border-radius: 10px;
        cursor: pointer;
        color: #fff;
        transition: 0.4s ease;
    }

    .btnn:hover {
        background: #fff;
        color: maroon;
    }

    .btnn a {
        text-decoration: none;
        color: black;
        font-weight: bold;
    }

    h2 {
        text-align: center;
        padding: 20px;
        font-family: sans-serif;

    }

    div.register {
        background-color: maroon;
        width: 100%;
        font-size: 18px;
        border-radius: 10px;
        border: 1px solid rgba(255, 255, 255, 0.3);
        /* box-shadow: 2px 2px 15px rgba(0, 0, 0, 0.3); */
        color: #fff;

    }

    form#register {
        margin: 40px;

    }

    label {
        font-family: sans-serif;
        font-size: 18px;
        font-style: italic;
    }

    input#name {
        width: 300px;
        border: 1px solid #ddd;
        border-radius: 3px;
        outline: 0;
        padding: 7px;
        background-color: #fff;
        box-shadow: inset 1px 1px 5px rgba(0, 0, 0, 0.3);
    }

    input#dfield {
        width: 300px;
        border: 1px solid #ddd;
        border-radius: 3px;
        outline: 0;
        padding: 7px;
        background-color: #fff;
        box-shadow: inset 1px 1px 5px rgba(0, 0, 0, 0.3);
    }

    input#datefield {
        width: 300px;
        border: 1px solid #ddd;
        border-radius: 3px;
        outline: 0;
        padding: 7px;
        background-color: #fff;
        box-shadow: inset 1px 1px 5px rgba(0, 0, 0, 0.3);
    }

    * {
        margin: 0;
        padding: 0;

    }

    .hai {
        width: 100%;
        height: 0px;


    }


    .navbar {
        width: 1200px;
        height: 75px;
        margin: auto;
    }

    .icon {
        width: 200px;
        float: left;
        height: 70px;
    }

    .logo {
        color: maroon;
        font-size: 35px;
        font-family: Arial;
        padding-left: 20px;
        float: left;
        padding-top: 10px;

    }

    .menu {
        width: 400px;
        float: left;
        height: 70px;
        margin: 10px 120px;
    }

    ul {
        float: left;
        display: flex;
        justify-content: center;
        align-items: center;
        color: black;
    }

    ul li {
        list-style: none;
        margin-left: 80px;
        margin-top: 20px;
        font-size: 14px;
        color: black;

    }

    ul li a {
        text-decoration: none;
        color: maroon;
        font-family: Arial;
        font-weight: bold;
        transition: 0.4s ease-in-out;

    }

    .nn {
        width: 100px;
        background: maroon;

        border: none;
        height: 40px;
        font-size: 18px;
        border-radius: 10px;
        cursor: pointer;
        color: white;
        transition: 0.4s ease;


    }

    .nn a {
        text-decoration: none;
        color: white;
        font-weight: lighter;
    }

    .nn:hover {
        background-color: green;
    }

    .circle {
        border-radius: 48%;
        width: 65px;
    }

    .phello {
        width: 200px;
        margin-left: -50px;
        padding: 0px;
    }
    </style>
    <?php

    // Initialize $email to avoid undefined variable error
    $email = [];
    $fname = $lname = '';


    // Check if the user is logged in
    if (!isset($_SESSION['email'])) {
        // If not logged in, redirect to the login form
        if (isset($_GET['id'])) {
            $bikeid = $_GET['id'];
            // Redirect to login form with redirect parameter
            header("Location:../loginform.php?id=$bikeid");
            exit();

        } else {
            // Redirect to login form without redirect parameter
            header("Location:../loginform.php");
            exit();

        }
        exit; // Stop further execution of the script
    }
    // Check if the 'id' parameter is set in the URL
    if (!empty($_GET['id'])) {
        $bikeid = $_GET['id'];

        $sql = "SELECT * FROM bikes where BikeID='$bikeid'";
        $result = mysqli_query($conn, $sql);

        // Check if the query was successful and if there are any results
        if ($result && mysqli_num_rows($result) > 0) {
            $email = mysqli_fetch_assoc($result);
        } else {
            echo "Bike details not found.";
        }
    }


    // Fetch user details from session
    if (!empty($_SESSION['email'])) {

        $value = $_SESSION['email'];
        
        $sql = "SELECT * FROM jawauser where Email='$value'";
        $name = mysqli_query($conn, $sql);
        if ($name && mysqli_num_rows($name) > 0) {
            $rows = mysqli_fetch_assoc($name);
            $uemail = $rows['Email'];
            // $price = $email['Price'];
            if (isset($email['Price'])) {
                $price = $email['Price'];
            } else {
                //Handle the case where the price is not available
                $price = 0;
            }
            // $price = isset($email['Price']) ? $email['Price'] : 0;
            $fname = $rows['FName'];
            $lname = $rows['LName'];
        } else {
            echo "User details not found.";
        }
    }


    // Check if user details are fetched successfully


    // Check if the form is submitted
    if (isset($_POST['book'])) {
        
        $bplace = mysqli_real_escape_string($conn, $_POST['place']);
        $bdate = date('Y-m-d', strtotime($_POST['date']));;
        $cusn = mysqli_real_escape_string($conn, $_POST['cusn']);
        $phno = mysqli_real_escape_string($conn, $_POST['ph']);

        if (empty($bplace) || empty($bdate) || empty($cusn) || empty($phno)) {
            echo '<script>alert("please fill the place")</script>';
        } else {
            
// Insert into bookjawa table if email is unique
            $fetch=new bookjawa($conn);
    $result=$fetch->getBikeModel($bikeid,$uemail,$bplace,$bdate,$cusn,$phno,$price);

                
                
                $_SESSION['booking_details'] = [
                    'bike_id' => $bikeid,
                    'email' => $value,
                    'place' => $bplace,
                    'date' => $bdate,
                    'customer_name' => $cusn,
                    'phone' => $phno,
                    'price' => $email['Price']
                ];

                echo '<script>window.location.href = "khaltipay.php";</script>';
                // header("Location: pay.php");
                // echo '<script>window.location.href = "../pay.php";</script>';
                exit();
                // if ($result) {

                //     $_SESSION['email'] = $uemail;
                //     echo '<script>window.location.href = "payment.php";</script>';

                // //   header("Location:payment.php");
                //   exit();
                // } else {
                //     echo '<script>alert("please check the connection")</script>';
                // }
            // }
        }
    }

    // }

    ?>

    <div class="hai">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">Booking Form</h2>
            </div>
            <div class="menu">
                <ul>
                    <!-- <li><a href="../FRONTEND/booking.php">Back</a></li>
                    <li><button class="nn"><a href="../logout.php">LOGOUT</a></button></li> -->
                    <li><button class="nn"><a href="../FRONTEND/bookingIndex.php">BACK</a></button></li>
                    <li>
                        <p class="phello">HELLO &nbsp;<a id="pname"><?php echo $fname . ' ' . $lname;  ?>!</a>
                        </p>
                    </li>


                </ul>
            </div>
        </div>
    </div>


    <div class="main">

        <div class="register">
            <h2>BOOKING</h2>
            <form id="register" method="POST" action="../admin/khaltipay.php?id=<?php echo $bikeid; ?>&source=page1">
                <?php if (!empty($email) && isset($email['Model'])) : ?>
                <input type="hidden" name="id" value="<?php echo $email['BikeID']; ?>">
                <h2>BIKE MODEL : <?php echo $email['Model']; ?></h2><?php else : ?>
                <p>Error: Bike details not found.</p><?php endif; ?>
                <label>CUSTOMER NAME : </label>
                <br>
                <input type=" text" name="cusn" id="name" placeholder="Customer name" required>
                <br><br>
                <label>BOOKING PLACE : </label>
                <br>
                <input type="text" name="place" id="name" placeholder="Booking Place From..." required>
                <br><br>

                <label>BOOKING DATE : </label>
                <br>
                <input type="date" name="date" id="datefield" min='1899-01-01' max='2000-13-13'
                    placeholder="Enter the date for booking" required>
                <br><br>

                <label>PHONE NUMBER : </label>
                <br>
                <input type="tel" name="ph" maxlength="10" id="name" placeholder="Enter Your Phone Number" required>
                <br><br>

                <button type="submit" class="btnn" value="BOOK" name="book">book</button>


            </form>
        </div>
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




</body>

</html>