<?php

require_once('../config/constant.php');
$email=$_GET['id'];

$sql="DELETE from payments where id='$email'";
$result=mysqli_query($conn,$sql);

echo '<script>alert("PAYMENT DELETED SUCCESFULLY")</script>';
echo '<script> window.location.href = "order1.php";</script>';

?>