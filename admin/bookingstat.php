<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOKING STATUS</title>
</head>

<body>
    <style>
    * {
        margin: 0;
        padding: 0;

    }

    .box {

        position: center;
        top: 50%;
        left: 50%;
        padding: 20px;
        box-sizing: border-box;
        background: #fff;
        border-radius: 4px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
        background: linear-gradient(to top, rgba(255, 251, 251, 1)70%, rgba(250, 246, 246, 1)90%);
        display: flex;
        align-content: center;
        width: 700px;
        height: 250px;
        margin-top: 100px;
        margin-left: 350px;


    }


    .box .content {
        margin-left: 5px;
    }

    .box .button {
        width: 240px;
        height: 40px;
        background: #ff7200;
        border: none;
        margin-top: 30px;
        font-size: 18px;
        border-radius: 10px;
        cursor: pointer;
        color: #fff;
        transition: 0.4s ease;
    }

    .utton {
        width: 200px;
        height: 40px;

        background: maroon;
        border: none;
        font-size: 18px;
        border-radius: 5px;
        cursor: pointer;
        color: #fff;
        transition: 0.4s ease;
        margin-top: 10px;
        margin-left: 10px;
    }

    .utton a {
        text-decoration: none;
        color: white;
        font-weight: bold;
    }

    ul {
        float: left;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 100px;
    }

    ul li {
        list-style: none;
        margin-left: 200px;
        margin-top: -130px;
        font-size: 35px;

    }

    .name {
        font-weight: normal;
    }
    </style>


    <?php include('../config/constant.php');?>

    <?php
   
    $email = $_SESSION['email'];

    $sql="select * from bookjawa where Email='$email' order by BookID DESC LIMIT 1";
    $name = mysqli_query($conn,$sql);
    $rows=mysqli_fetch_assoc($name);
    if($rows==null){
        echo '<script>alert("THERE ARE NO BOOKING DETAILS")</script>';
        echo '<script> window.location.href = "../FRONTEND/booking.php";</script>';
    }
    else{
    $sql2="select * from jawauser where Email='$email'";
    $name2 = mysqli_query($conn,$sql2);
    $rows2=mysqli_fetch_assoc($name2);
    $bikeid=$rows['BikeID'];
    $sql3="select * from bikes where BikeID='$bikeid'";
    $name3 = mysqli_query($conn,$sql3);
    $rows3=mysqli_fetch_assoc($name3);





?>
    <ul>
        <li> <button class="utton"><a href="../FRONTEND/bookingIndex.php">Go to Home</a></button></li>
        <li class="name">HELLO! <?php echo $rows2['FName']." ".$rows2['LName']?></li>




    </ul>
    <div class="box">
        <div class="content">
            <h1>Bike Model : <?php echo $rows3['Model']?></h1><br>
            <h1>Price : <?php echo $rows['Price']?></h1><br>
            <h1>Booking Status : <?php echo $rows['BookStatus']?></h1><br>

        </div>
    </div>



    <?php }
?>

</body>

</html>