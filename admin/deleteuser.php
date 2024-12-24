<?php

require_once('../config/constant.php');
$email=$_GET['id'];

$sql="DELETE from jawauser where Email='$email'";
$result=mysqli_query($conn,$sql);

echo '<script>alert("USER DELETED SUCCESFULLY")</script>';
echo '<script> window.location.href = "adminusers.php";</script>';

?>