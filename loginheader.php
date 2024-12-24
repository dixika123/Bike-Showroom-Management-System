<?php 

if(!isset($_SESSION['email'])){
	header("location:loginform.php");
    exit; // Add exit to stop execution if not logged in
}
else{
    require_once('config/constant.php');

    $value = $_SESSION['email'];
    $_SESSION['email'] = $value;
    
    $sql="select * from jawauser where Email='$value'";
    $name = mysqli_query($conn,$sql);
    $rows=mysqli_fetch_assoc($name);}
    ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Car Rental system</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="css/loginheader.css">


</head>

<body>
    <header>

        <ul class="navbar">
            <div class="phello">
                <p class="phello">HELLO!
                    <b>&nbsp;<a id="pname"><?php echo $rows['FName']." ".$rows['LName']?></a>
                </p>
                </b>
            </div>
            <ul class="menu">
                <li><a href="feedback.php">Feedbacks</a></li>
                <li><a id="stat" href="../admin/bookingstat.php">Booking Status</a></li>
            </ul>
            <div class="header-btn">
                <a href="logout.php" class="login">Logout</a>

            </div>
    </header>