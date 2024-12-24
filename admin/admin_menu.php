<?php
include('../config/constant.php');
if(!isset($_SESSION['admin_id'])) {
    // Redirect to the admin login page
    header('Location: adminlogin.php');
    exit(); // Make sure to stop further execution
}
?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style type="text/css">
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

        font-size: 0.9em;

        border-radius: 5px 5px 0 0;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        margin-left: 350px;
        margin-top: 25px;
        width: 800px;
        height: 500px;
    }

    .content-table thead tr {
        background-color: orange;
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
        border-bottom: 2px solid orange;
    }

    .content-table thead .active-row {
        font-weight: bold;
        color: orange;
    }


    .header {
        margin-top: 70px;
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

    /* maile add gareko */
    .main-content {
        margin-left: 80px;
        padding: 2rem;
        transition: margin-left 0.5s;
    }

    /* .container {
            max-width: 1200px;
            margin: auto;
            padding: 2rem;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        } */

    h1,
    h2 {
        margin-bottom: 1rem;
    }

    h1 {
        font-size: 2.5rem;
        color: maroon;
    }

    h2 {
        font-size: 1.5rem;
        color: maroon;
    }

    .top-half-content {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin-top: 1rem;
    }

    .top-half-content>div {
        background: maroon;
        color: white;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .top-half-content>div:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .btn-primary {
        background-color: white;
        color: maroon;
        border: none;
        margin-top: 10px;
        padding: 10px 20px;
        text-align: center;
        border-radius: 30px;
        text-decoration: none;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
    }

    .btn-primary:hover {
        background-color: maroon;
        color: white;
    }

    .btn-primary h3 {
        margin: 0;
    }

    /* @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                padding: 1rem;
            }

            .container {
                padding: 1rem;
            }

            .btn-primary {
                padding: 8px 16px;
                font-size: 14px;
            }
        } */
    </style>
</head>


<body>
    <div class="background">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo"><a href="admin_menu.php" style="color: maroon;">AdminPanel</a></h2>

            </div>
            <div class="menu">
                <?php include("menu.php");?>
            </div>
        </div>
        <div class="main-content">
            <div class="container">
                <h1>Dashboard</h1>

                <div class="top-half-content">
                    <div class="booking">
                        <h3><?php
                        $count_book = "SELECT COUNT(BookID) AS count FROM `bookjawa`;";
                        $result = mysqli_query($conn, $count_book);
                        $row = mysqli_fetch_assoc($result);
                        $count = $row['count'];
                        echo $count;
                        ?> Pending Bookings</h3>

                    </div>
                    <div class="enquiry">
                        <h3><?php
                        $count_sql = "SELECT COUNT(EID) AS count FROM `enquiry`;";
                        $result = mysqli_query($conn, $count_sql);
                        $row = mysqli_fetch_assoc($result);
                        $count = $row['count'];
                        echo $count;
                        ?> Enquires</h3>
                    </div>
                    <div class="feedback">
                        <h3><?php
                        $count_sql = "SELECT COUNT(feedID) AS count FROM `feedback`;";
                        $result = mysqli_query($conn, $count_sql);
                        $row = mysqli_fetch_assoc($result);
                        $count = $row['count'];
                        echo $count;
                        ?> Feedback</h3>
                    </div>
                    <div class="accessories">
                        <h3><?php
                        $count_sql = "SELECT COUNT(AID) AS count FROM `accessories`;";
                        $result = mysqli_query($conn, $count_sql);
                        $row = mysqli_fetch_assoc($result);
                        $count = $row['count'];
                        echo $count;
                        ?> Accessories</h3>
                    </div>
                    <div class="accessories_order">
                        <h3><?php
                        $count_sql = "SELECT COUNT(ID) AS count FROM `payments`;";
                        $result = mysqli_query($conn, $count_sql);
                        $row = mysqli_fetch_assoc($result);
                        $count = $row['count'];
                        echo $count;
                        ?> Payments</h3>
                    </div>
                    <div class="testride">
                        <h3><?php
                        $count_sql = "SELECT COUNT(testID) AS count FROM `testride`;";
                        $result = mysqli_query($conn, $count_sql);
                        $row = mysqli_fetch_assoc($result);
                        $count = $row['count'];
                        echo $count;
                        ?> Test Rides</h3>
                    </div>

                </div>
            </div>
        </div>


</body>

</html>