<?php

require_once('../config/constant.php');
$aid=$_GET['id'];
$sql="DELETE from accessories where AID=$aid";
$result=mysqli_query($conn,$sql);

echo '<script>alert("ACCESSORY DELETED SUCCESFULLY")</script>';
echo '<script> window.location.href = "accessory.php";</script>';



?>