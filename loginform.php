<?php
include('config/constant.php');
// $bid=$_GET['id'];

if(isset($_POST['login'])){
   // if(isset($_GET['id'])){
        //$id=$_GET['id'];
        //$id=$_POST['id'];
        //echo $id;
    //}
    // print_r($_POST);die;
    $id = isset($_POST['id']) ? $_POST['id'] : ''; // Initialize $id properly
    $email=$_POST['email'];
   // echo $email;die;
    $pass=sha1($_POST['pass']);
    if(empty($email)|| empty($pass))
        {
            echo '<script>alert("please fill the blanks")</script>';
        }
        else{
            $query="select * from jawauser where Email='$email'";
            $res=mysqli_query($conn,$query);
            // print_r($res);die;
           // echo $res;
            if($row=mysqli_fetch_assoc($res)){
                $db_password = $row['Password'];
                if($pass == $db_password)
                {
                    //session_start();
                    $_SESSION['email'] = $email;
                    $_SESSION['id'] = $row['id']; // assuming the ID column is named 'id'


                    // Redirect the user
                if(!empty($id)) {
                echo '<script>window.location.href=" FRONTEND/bookingIndex.php?id=$id";</script>';
                } 
                // else {
                //     header("Location: admin/bookings.php");
                // }
                exit;
            } else {
                echo '<script>alert("Invalid password")</script>';
            }
        } else {
            echo '<script>alert("Invalid email")</script>';
        }
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <style>
    body {
        width: 90%;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        height: 50vh;
    }

    .form {
        width: 300px;
        height: 350px;
        background: white;
        position: absolute;
        top: 200px;
        left: 400px;
        border: 1px solid black;
        border-radius: 10px;
        padding: 20px;


    }

    .form h2 {
        width: 90%;
        font-family: sans-serif;
        text-align: center;
        color: maroon;
        font-size: 22px;


        margin: 2px;
        padding: 8px;

    }

    .h {
        width: 100%;
        height: 50px;
        background: whitesmoke;
        border: 1px solid black;
        border-radius: 10px;
        color: black;
        font-size: 15px;
        letter-spacing: 1px;
        margin-top: 20px;
        font-family: sans-serif;
    }

    .h:focus {
        outline: none;
    }

    ::placeholder {
        color: lightslategray;
        font-family: Arial;

    }

    .btnn {
        width: 300px;
        height: 40px;

        background: maroon;
        border: none;
        margin-top: 40px;
        font-size: 18px;
        border-radius: 10px;
        cursor: pointer;
        color: whitesmoke;

    }

    .btnn:hover {
        background: #7f8fa6;
        color: whitesmoke;
    }

    .btnn a {
        text-decoration: none;
        color: black;
        font-weight: bold;
    }

    .form .link {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 17px;
        padding-top: 20px;
        text-align: center;
        color: black;
    }

    .form .link a {
        text-decoration: none;
        color: black;
        font-weight: bold;
    }

    .back {
        width: 150px;
        height: 40px;
        background: maroon;
        border: none;
        margin-top: 0px;
        margin-left: 1000px;
        font-size: 18px;
        border-radius: 10px;
        cursor: pointer;
        color: #fff;
    }

    .back a {
        text-decoration: none;
        color: #fff;
        font-weight: bold;
    }
    </style>
</head>

<body>

    <button class="back"><a href="FRONTEND/index.php">Go To Home</a></button>


    <form class="form" method="post">
        <h2>User Login</h2>
        <input type="hidden" name="id" value="<?php echo $bid;?>">
        <input type="email" name="email" placeholder="Enter email" class="h">
        <input type="password" name="pass" placeholder="Enter password" class="h">
        <input type="submit" class="btnn" value="login" name="login">
        <p class="link">Don't have an account?<br>
            <a href="register.php">Sign up</a>
        </p>
    </form>
</body>

</html>