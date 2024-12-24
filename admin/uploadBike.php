<?php
include('../FRONTEND/userclass.php');
if(isset($_POST['addbike']) ){
    require_once('../config/constant.php');
   echo "<prev>";
   print_r($_FILES['image']);
   echo "</prev>";
   

                $bikemodel=mysqli_real_escape_string($conn,$_POST['bikemodel']);
                $price=mysqli_real_escape_string($conn,$_POST['price']);
                $mileage=mysqli_real_escape_string($conn,$_POST['mileage']);
                $description=mysqli_real_escape_string($conn,$_POST['description']);
                $available="Y";
                $img_name= $_FILES['image']['name'];
                $tmp_name= $_FILES['image']['tmp_name'];

                $fetch=new admin($conn);
                $res=$fetch->addBike($bikemodel,$img_name,$price,$mileage,$description,$available);
                
                if($res){
                    $target_dir="../images/";
                    $target_file=$target_dir.basename($img_name);
                    move_uploaded_file($tmp_name,$target_file);
                    echo '<script>alert("New Bike Added Successfully!!")</script>';
                    echo '<script> window.location.href = "bike.php";</script>'; 
                }
                else{
                        echo '<script>alert("Cant upload this type of image")</script>';
                        echo '<script> window.location.href = "addbike.php";</script>';   
                    }               

        }
        else{
        $em="unknown error occured";
        header("Location: addbike.php?error=$em");
        }

?>