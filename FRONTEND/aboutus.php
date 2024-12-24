<?php include('../nav.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Jawa Showroom Nepal</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 50px auto;
        background-color: maroon;
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .about-section {
        margin-bottom: 30px;
        text-align: center;
    }

    .about-section h1 {
        color: white;
        margin-bottom: 10px;
    }

    .about-section p {
        margin-bottom: 20px;
        text-align: justify;
        color: white;
    }

    .location-section h2 {
        color: white;
        margin-bottom: 10px;
        text-align: center;
    }

    .map {
        height: 300px;
        width: 100%;
        border-radius: 10px;
        margin-top: 20px;
        text-align: center;
    }
    </style>
</head>

<body>

    <div class="container">
        <div class="about-section">
            <h1>About Us</h1> <br>
            <p>Welcome to the Jawa Showroom Nepal located in Uttardhoka, Nepal. We are passionate about bringing the
                iconic Jawa motorcycles to enthusiasts in Nepal.</p>
            <p>Our mission is to provide customers with the highest quality motorcycles and excellent customer
                service.
                At our showroom, you'll find a wide range of Jawa motorcycles to choose from, along with genuine
                accessories and merchandise.</p>
            <p>Visit us today to experience the timeless elegance and performance of Jawa motorcycles!</p>
            <p>For any inquiries or assistance, feel free to contact us at [email address] or [phone number].</p>
        </div>

        <div class="location-section">
            <h2>Our Location</h2>
            <div id="map" class="map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d904326.0697797628!2d84.23499132987419!3d27.701112096746595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb191ad9b3ff65%3A0x38d542c0bce009!2sAgni%20Motoinc%20-%20Jawa%20Yezdi%20Nepal!5e0!3m2!1sen!2snp!4v1714274546486!5m2!1sen!2snp"
                    width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div><br><br>

    <?php include('../footer.php'); ?>


</body>

</html>