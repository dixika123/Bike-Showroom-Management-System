<?php
include('../bookingNav.php');
include('../config/constant.php');
$sql="SELECT * from bikes";
$result=mysqli_query($conn,$sql);
?>



<!-- middle body -->


<div class="header">
    <br>
    <h1>JAWA MOTORCYCLES</h1>
    <h3>
        <p>Inherit the Authenticity of a LEGEND</p>
    </h3>
</div>

<div class="product-details">
    <h1 class="t">Yezdi Adventure</h1> <br><br>
    <div class="imgs">
        <!-- Display photos of the product -->
        <div class="photos"><br><br>
            <img src="../images/adventurepic.png" alt="Product Photo 2">
        </div>
    </div>
    <div class="price">
        <h1>Rs. 9,98,000</h1>
        <br>
    </div>
    <div class="specifications">
        <br>
        <h2>Specifications</h2>
        <ul>
            <li><b>CAPACITY</b>- 334cc</li>
            <li><b>MAX POWER</b>- 30.30BHP</li>
            <li><b>MAX TORQUE</b>- 29.90Nm</li>
            <li><b>Fuel Tank Capacity</b>- 15.5L</li>
            <li><b>COMPRESSION RATIO</b>- 11:1</li>
            <li><b>BORE STROKE</b>- 81 X 65mm</li>
            <li><b>Engine Type</b>- Single cylinder, 4 stroke</li>
            <li><b>Fuel System</b>- Electronic Fuel Injection</li>
            <li><b>Weight</b>- 188kg</li>
            <li><b>Chassis frame</b>- Double Cradle</li>
            <li><b>Brake</b>- Disc with floating caliper and ABS</li>
            <!-- <li><b>BORE STROKE</b>-81 X 65mm</li> -->
            <!-- Add more specifications as needed -->
        </ul>
    </div>

</div> <br> <br>
<div class="product-details">
    <h1 class="t">Yezdi Roadster</h1>
    <div class="imgs">
        <!-- Display photos of the product -->
        <div class="photos"><br><br>
            <img src="../images/Roadsterpic.png" alt="Product Photo 2">
        </div>
    </div>
    <div class="price" style="justify-content: baseline;">
        <h1>Rs. 9,16,000</h1>
        <br>
    </div>
    <div class="specifications">
        <br>
        <h2>Specifications</h2>
        <ul>
            <li><b>CAPACITY</b>- 334cc</li>
            <li><b>MAX POWER</b>- 29.50BHP</li>
            <li><b>MAX TORQUE</b>- 28.95Nm</li>
            <li><b>Fuel Tank Capacity</b>- 12.5L</li>
            <li><b>COMPRESSION RATIO</b>- 11:1</li>
            <li><b>BORE STROKE</b>- 81 X 65mm</li>
            <li><b>Engine Type</b>- Single cylinder, 4 stroke</li>
            <li><b>Fuel System</b>- Electronic Fuel Injection</li>
            <li><b>Weight</b>- 194kg</li>
            <li><b>Chassis frame</b>- Double Cradle</li>
            <li><b>Brake</b>- Disc with floating caliper and ABS</li>
            <!-- Add more specifications as needed -->
        </ul>
    </div>

</div>
<br> <br>
<div class="product-details">
    <h1 class="t">Yezdi Scrambler</h1>
    <div class="imgs">
        <!-- Display photos of the product -->
        <div class="photos"><br><br>
            <img src="../images/scram.png" alt="Product Photo 2">
        </div>
    </div>
    <div class="price" style="justify-content: baseline;">
        <h1>Rs. 9,56,000</h1>
        <br>
    </div>
    <div class="specifications">
        <br>
        <h2>Specifications</h2>
        <ul>
            <li><b>CAPACITY</b>- 334cc</li>
            <li><b>MAX POWER</b>- 29.77BHP</li>
            <li><b>MAX TORQUE</b>- 28.20Nm</li>
            <li><b>Fuel Tank Capacity</b>- 12.5L</li>
            <li><b>COMPRESSION RATIO</b>- 11:1</li>
            <li><b>BORE STROKE</b>- 81 X 65mm</li>
            <li><b>Engine Type</b>- Single cylinder, 4 stroke</li>
            <li><b>Fuel System</b>- Electronic Fuel Injection</li>
            <li><b>Weight</b>- 182kg</li>
            <li><b>Chassis frame</b>- Double Cradle</li>
            <li><b>Brake</b>- Disc with floating caliper and ABS</li>
            <!-- Add more specifications as needed -->
        </ul>
    </div>

</div>
<br> <br>
<div class="product-details">
    <h1 class="t">Perak</h1>
    <div class=" imgs">
        <!-- Display photos of the product -->
        <div class="photos"><br><br>
            <img src="../images/perakpic.png" alt="Product Photo 2">
        </div>
    </div>
    <div class="price" style="justify-content: baseline;">
        <h1>Rs. 8,20,000</h1>
        <br>
    </div>
    <div class="specifications">
        <br>
        <h2>Specifications</h2>
        <ul>
            <li><b>CAPACITY</b>-334cc</li>
            <li><b>MAX POWER</b>-30.64BHP</li>
            <li><b>MAX TORQUE</b>-32.74Nm</li>
            <li><b>Fuel Tank Capacity</b>- 14L</li>
            <li><b>WheelBase</b>- 1485 mm</li>
            <li><b>Seat Height</b>- 750 mm</li>
            <li><b>Engine Type</b>- Single cylinder, 4 stroke</li>
            <li><b>Fuel System</b>- Electronic Fuel Injection</li>
            <li><b>Weight</b>- 175kg</li>
            <li><b>Chassis frame</b>- Double Cradle Tabular frame</li>
            <li><b>Brake</b>- Disc with floating caliper and ABS</li>

            <!-- Add more specifications as needed -->
        </ul>
    </div>

</div>

<br> <br>
<div class="product-details">
    <h1 class="t">Jawa 350</h1>
    <div class="imgs">
        <!-- Display photos of the product -->
        <div class="photos"><br><br>
            <img src="../images/JawaClassicpic.png" alt="Product Photo 2">
        </div>
    </div>
    <div class="price" style="justify-content: baseline;">
        <h1>Rs. 6,76,500</h1>
        <br>
    </div>
    <div class="specifications">
        <br>
        <h2>Specifications</h2>
        <ul>
            <li><b>CAPACITY</b>-334cc</li>
            <li><b>MAX POWER</b>-22.57ps</li>
            <li><b>MAX TORQUE</b>-28.1Nm</li>
            <li><b>Fuel Tank Capacity</b>- 13.2L</li>
            <li><b>WheelBase</b>- 1449 mm</li>
            <li><b>Seat Height</b>- 790 mm</li>
            <li><b>Engine Type</b>- Single cylinder, 4 stroke</li>
            <li><b>Fuel System</b>- Electronic Fuel Injection</li>
            <li><b>Weight</b>- 184kg</li>
            <li><b>Chassis frame</b>- Double Cradle</li>
            <li><b>Brake</b>- Disc with floating caliper and ABS</li>

            <!-- Add more specifications as needed -->
        </ul>
    </div>

</div>

<br> <br>
<div class="product-details">
    <h1 class="t">JAWA 42</h1>
    <div class="imgs">
        <!-- Display photos of the product -->
        <div class="photos"><br><br>
            <img src="../images/Jawa42pic.png" alt="Product Photo 2">
        </div>
    </div>
    <div class="price" style="justify-content: baseline;">
        <h1>Rs. 6,48,000 </h1>
        <br>
    </div>
    <div class="specifications">
        <br>
        <h2>Specifications</h2>
        <ul>
            <li><b>CAPACITY</b>-294.72cc</li>
            <li><b>MAX POWER</b>-27.32ps</li>
            <li><b>MAX TORQUE</b>-26.84Nm</li>
            <li><b>Fuel Tank Capacity</b>- 12.5L</li>
            <li><b>WheelBase</b>- 1369 mm</li>
            <li><b>Seat Height</b>- 788 mm</li>
            <li><b>Engine Type</b>- Single cylinder, 4 stroke</li>
            <li><b>Fuel System</b>- Electronic Fuel Injection</li>
            <li><b>Weight</b>- 182kg</li>
            <li><b>Chassis frame</b>- Double Cradle</li>
            <li><b>Brake</b>- Disc with floating caliper and ABS</li>

            <!-- Add more specifications as needed -->
        </ul>
    </div>

</div>



</body>



<!-- /* styles.css */ -->


<style>
/* .product-details {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 20px;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.product-details h2 {
    font-size: 24px;
    color: #333;
    text-align: center;
    margin-bottom: 10px;
}

.product-details .imgs {
    width: 100%;
    text-align: center;
    border: 2px solid #ddd; */
/* Add border to the image container */
/* border-radius: 8px; */
/* Optional: Add border radius for a softer look */
/* overflow: hidden; */
/* Hide any overflowing content */
/* }

.product-details .photos img {
    width: 40%;
    height: auto;
    border-bottom: 2px solid #ddd; */
/* Add border at the bottom of the image */
/* }

.product-details .price {
    width: 100%;
    text-align: center;
    margin-top: 20px;
}

.product-details .price h1 {
    font-size: 32px;
    color: #333;
    border-top: 2px solid #ddd; */
/* Add border at the top of the price */
/* padding-top: 10px; */
/* Optional: Add some padding to separate the image and price */
/* }

.specifications {
    width: 100%;
    text-align: center;
    margin-top: 20px;
}

.specifications ul {
    list-style-type: none;
    padding: 0;
}

.specifications ul li {
    margin-bottom: 10px;
    color: #555; */
/* } */
.product-details {
    display: flex;
    margin: 30px;
    padding: 20px;
    background-color: maroon;
    border: 1px solid black;
    border-radius: 8px;
}

.product-details h2 {
    font-size: 32px;
    color: whitesmoke;
    text-align: justify;
    margin-bottom: 10px;
}

.product-details h1 {
    position: relative;
    left: -90px;
    font-size: 32px;
    color: whitesmoke;
    justify-content: center;
    margin-bottom: 10px;
    width: 50%;
}

.product-details .t {
    position: relative;
    left: 400px;
    font-size: 32px;
    color: whitesmoke;
    justify-content: center;
    margin-bottom: 10px;
    width: 50%;
}

/* .product-details .imgs {
    width: 50%;
    margin-right: 5px;
} */

/* .product-details .photos {
    text-align: center;
} */

.product-details .photos img {
    width: 300%;
    height: auto;
    margin-left: -150px;
    /* border-radius: 8px; */
    /* margin-right: 1px; */

}

.product-details .price {
    width: 80%;
    text-align: left;
    margin-top: 28%;
    position: sticky;
}

.product-details .price h1 {
    font-size: 32px;
    color: white;
}

.product-details .specifications {
    width: 80%;
}

.product-details .specifications ul {
    list-style-type: none;
    padding: 0;
}

.product-details .specifications ul li {
    margin-bottom: 10px;
    color: whitesmoke;
}
</style>

<?php include('../footer.php');
?>