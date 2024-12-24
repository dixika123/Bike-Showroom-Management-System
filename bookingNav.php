<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike Showroom Management System</title>

    <link rel="stylesheet" href="../css/style.css">
    <!-- <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
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
        <div class="navbar">
            <a href="Dashboard.php">Home</a>
            <a href="Aftermotorcycles.php">Motorcycles</a>
            <a href="Afterenquiry.php">Enquiry</a>
            <a href="bookingIndex.php">Booking</a>
            <a href="Aftertestride.php">Test Ride</a>
            <a href="Afteraccessories.php">Accessories</a>
            <a href="Afterfeedback.php">Feedbacks</a>
            <div class="dropdown">
                <button class="dropbtn">Profile
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <!-- <a href="../admin/bookingstat.php">Booking Status</a> -->
                    <a href="../edit_profile.php">Edit Profile</a>
                    <a href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>
</body>

<style>
.navbar {
    overflow: hidden;
    /* background-color: #333; */
}

.navbar a {
    float: left;
    font-size: 16px;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.dropdown {
    float: left;
    overflow: hidden;
}

.dropdown .dropbtn {
    font-size: 16px;
    border: none;
    outline: none;
    color: white;
    padding: 14px 16px;
    background-color: inherit;
    font-family: inherit;
    margin: 0;
}

.navbar a:hover,
.dropdown:hover .dropbtn {
    color: #ea8181;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    /* box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2); */
    z-index: 1;
}

.dropdown-content a {
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {
    background-color: #ddd;
}

.dropdown:hover .dropdown-content {
    display: block;
}

body {
    font-family: sans-serif;
    margin: 0;
    padding: 0;
    background: rgba(0, 0, 0, 0);

}
</style>

</html>