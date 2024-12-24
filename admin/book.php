<?php
include('../config/constant.php');
if(!isset($_SESSION['admin_id'])) {
    // Redirect to the admin login page
    header('Location: adminlogin.php');
    exit(); // Make sure to stop further execution
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRATOR</title>
</head>

<body>

    <style>
    * {
        margin: 0;
        padding: 0;

    }

    .background {
        width: 100%;
        background-position: center;
        background-size: cover;
        height: 109vh;
        animation: infiniteScrollBg 50s linear infinite;
    }

    .main {
        width: 100%;
        background: maroon;
        background-position: center;
        background-size: cover;
        height: 109vh;
        animation: infiniteScrollBg 50s linear infinite;
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

    }

    ul {
        float: left;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    ul li {
        list-style: none;
        margin-left: 62px;
        margin-top: 27px;
        font-size: 14px;

    }

    ul li a {
        text-decoration: none;
        color: black;
        font-family: Arial;
        font-weight: bold;
        transition: 0.4s ease-in-out;

    }

    .content-table {
        border-collapse: collapse;

        font-size: 1em;
        /* min-width: 400px; */
        border-radius: 5px 5px 0 0;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        margin-left: 100px;
        margin-top: 25px;
        width: 1300px;
        height: 300px;
    }

    .content-table thead tr {
        background-color: maroon;
        color: white;
        text-align: left;
    }

    .content-table th,
    .content-table td {
        padding: 12px 15px;


    }

    .content-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }

    .content-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;

    }

    .content-table tbody tr:last-of-type {
        border-bottom: 2px solid purple;
    }

    .content-table thead .active-row {
        font-weight: bold;
        color: maroon;
    }


    .header {
        margin-top: -700px;
        margin-left: 650px;
    }


    .nn {
        width: 100px;
        /* background: #ff7200; */
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
        color: black;
        font-weight: bold;

    }

    .but a {
        text-decoration: none;
        color: black;

    }
    </style>


    <?php
    $query="SELECT * from bookjawa ORDER BY BookID DESC";
    $queryy=mysqli_query($conn,$query);
    $num=mysqli_num_rows($queryy);


    ?>

    <div class="background">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo"><a href="admin_menu.php" style="color: maroon;">AdminPanel</a></h2>
            </div>
            <div class="menu">
                <?php include("menu.php");?>
            </div>
        </div>

    </div>
    <div>
        <h1 class="header">BOOKINGS</h1>
        <div>
            <div>
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Bike ID</th>
                            <th>EMAIL</th>
                            <th>BOOK PLACE</th>
                            <th>BOOK DATE</th>
                            <th>CUSTOMER NAME</th>
                            <th>MOBILE NUMBER</th>
                            <th>PRICE</th>
                            <!-- <th>BOOKING STATUS</th>
                            <th>APPROVE</th> -->
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                $sn=1;
                
                while($res=mysqli_fetch_array($queryy)){
                
                
                ?>
                        <tr class="active-row">
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $res['BikeID'];?></php>
                            </td>
                            <td><?php echo $res['Email'];?></php>
                            </td>
                            <td><?php echo $res['BookPlace'];?></php>
                            </td>
                            <td><?php echo $res['BookDate'];?></php>
                            </td>
                            <td><?php echo $res['Customer_Name'];?></php>
                            </td>
                            <td><?php echo $res['Mobile_Number'];?></php>
                            </td>
                            <td><?php echo $res['Price'];?></php>
                            </td>
                            <!-- <td><?php echo $res['BookStatus'];?></php>
                            </td> -->
                            <!-- <td><button type="submit" class="but" name="action"><a
                                        href="approve.php?id=<?php echo $res['BookID']?>">APPROVE</a></button></td>-->
                            <td> <button type="submit" class="but" name="action"><a
                                        href="deleteBooking.php?id=<?php echo $res['BookID']?>">DELETE</a></button>
                            </td>


                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>

</html>