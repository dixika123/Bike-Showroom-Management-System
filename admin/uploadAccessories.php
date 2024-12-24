<?php
if(isset($_POST['addaccessory']) ){
    require_once('../config/constant.php');
   echo "<prev>";
   print_r($_FILES['image']);
   echo "</prev>";
   

                $accessory_name=mysqli_real_escape_string($conn,$_POST['accessory_name']);
                $price=mysqli_real_escape_string($conn,$_POST['price']);
                $available="Y";
                $img_name= $_FILES['image']['name'];
                $tmp_name= $_FILES['image']['tmp_name'];
                $query="INSERT INTO accessories(accessory_name,accessory_image,price,available) values('$accessory_name','$img_name',$price,'$available')";
                $res=mysqli_query($conn,$query);
                if($res){
                    $target_dir="../images/";
                    $target_file=$target_dir.basename($img_name);
                    move_uploaded_file($tmp_name,$target_file);
                    echo '<script>alert("New Accessory Added Successfully!!")</script>';
                    echo '<script> window.location.href = "accessory.php";</script>'; 
                }
                else{
                        echo '<script>alert("Cant upload this type of image")</script>';
                        echo '<script> window.location.href = "addAccessories.php";</script>';   
                    }               

        }
        else{
        $em="unknown error occured";
        header("Location: addAccessories.php?error=$em");
        }

?>