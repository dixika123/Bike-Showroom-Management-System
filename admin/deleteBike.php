<?php

require_once('../config/constant.php');
$bikeid=$_GET['id'];
$sql="DELETE from bikes where BikeID=$bikeid";
$result=mysqli_query($conn,$sql);

echo '<script>alert("Bike DELETED SUCCESFULLY")</script>';
echo '<script> window.location.href = "bike.php";</script>';



?>