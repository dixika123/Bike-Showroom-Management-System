<?php
// if(!isset($_SESSION['id'])){
// 	header("location:adminlogin.php");
// }
require_once('../config/constant.php');
$bookid=$_GET['id'];
$sql="SELECT *from bookjawa where BookId=$bookid";
$result=mysqli_query($conn,$sql);
$res = mysqli_fetch_assoc($result);
$bikeid=$res['BikeID'];
$sql2="SELECT *from bikes where BikeID=$bikeid";
$bikeres=mysqli_query($conn,$sql2);
$bikeresult = mysqli_fetch_assoc($bikeres);
$email=$res['Email'];
$bikename=$bikeresult['Model'];
if($bikeresult['Available']=='Y')
{
if($res['BookStatus']=='APPROVED')
{
    echo '<script>alert("ALREADY APPROVED")</script>';
    echo '<script> window.location.href = "book.php";</script>';
}
else{
    $query="UPDATE bookjawa set  BookStatus='APPROVED' where BookID=$bookid";
    $queryy=mysqli_query($conn,$query);
    $sql2="UPDATE bikes set AVAILABLE='N' where BikeID=$res[BikeID]";
    $query2=mysqli_query($conn,$sql2);
    echo '<script> window.location.href = "book.php";</script>';
}  
}
else{
    echo '<script>alert("BIKE IS NOT AVAILABLE")</script>';
    echo '<script> alert("BIKE IS NOT AVAILABLE") window.location.href = "book.php";</script>';
}


?>