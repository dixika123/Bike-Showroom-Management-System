<?php
include('../nav.php');
// include("../loginheader.php");

include('../config/constant.php');

?>


<?php 

	$sql2="SELECT * from bikes where AVAILABLE='Y'";
     $bikes=$conn->query($sql2);
    //$bikes= mysqli_query($conn,$sql2);
	?>

<section class="ride" id="ride">
    <h1 class="head"> <span>Rides Available</span></h1>
    <!-- <p class="head1">Please <a href="../loginform.php">login</a> to book.</p> -->
    <div class="car">
        <div class="wrapper">
            <?php while($result= $bikes->fetch_assoc()) {
        //while($result= mysqli_fetch_array($bikes)) {
            // echo $result['BikeID'];
            // echo $result['AVAILABLE'];
            
    ?>
            <div class="box">
                <img src="../images/<?php echo $result['Bikeimage'];?>" alt="">
                <div class="content">
                    <?php $res=$result['BikeID'];?>
                    <h3><?php echo $result['Model']?></h3>
                    <div class="price"><span>Price: </span>Rs.<?php echo $result['Price']?></div>
                    <ul class="details" style="list-style: none;">
                        <li>Mileage: <?php echo $result['Mileage']?></< /li>
                        <li>Description: <?php echo $result['Descriptions']?></li>
                    </ul>
                    <br>
                    <a href="../admin/bookings.php?id=<?php echo $result['BikeID']; ?>" class="btn">book</a>

                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<style>
section {
    padding: 50px 100px;
}

.head {
    text-align: center;
    padding-bottom: 2rem;
    font-size: 4.5rem;
}

/* .btn {
    padding: 3px;
} */



.head1 {
    text-align: center;
    padding-bottom: 2rem;
    font-size: 1.5rem;
}

.ride .car .wrapper .box .content .btn {
    font-size: 1.2rem;
    background: maroon;
    border: 1px solid black;
    color: white;
    margin-bottom: 5px;
    vertical-align: 5px;

}

.ride .car .wrapper .box>img {
    height: 100px;
    width: 150px;
}

.ride .car .wrapper {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(25rem, 1fr));
    gap: 1.5rem;
}

.ride .car .wrapper .box {
    border: 1px solid black;
    text-align: center;
    padding: 2rem;
    border-radius: .5rem;
    box-shadow: #444;
}
</style>


<?php include('../footer.php');
?>