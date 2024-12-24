<?php
require_once('../config/constant.php');
$email=$_GET['id'];

$sql="DELETE from bookjawa where BookID=$email";
$result=mysqli_query($conn,$sql);

echo '<script>alert("BOOKING REQUEST DELETED SUCCESFULLY")</script>';
echo '<script> window.location.href = "book.php";</script>';

?>