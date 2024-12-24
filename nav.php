<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike Showroom Management System</title>

    <link rel="stylesheet" href="../css/style.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
    $(function() {
        $(".toggle").on("click", function() {
            $(".menu").toggleClass("active");
        })
    })
    </script>
</head>

<body>

    <nav>
        <div class="logo1">
            <a href="index.php"><img src="../images/JAWA.png" height="80" width="110" alt=""></a>
        </div>

        <!-- <div class="toggle">
            <a href="#">
                <ion-icon name="menu-outline"></ion-icon>
            </a>
        </div> -->

        <ul class="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="motorcycles.php">Motorcycles</a></li>
            <li><a href="enquiry.php">Enquiry</a></li>
            <li><a href="booking.php">Booking</a></li>
            <li><a href="testride.php">Test Ride</a></li>
            <li><a href="accessories.php">Accessories</a></li>
            <li><a href="feedback.php">Feedbacks</a></li>


        </ul>


    </nav>

</body>

</html>