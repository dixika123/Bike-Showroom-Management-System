<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN LOGIN</title>
    <script type="text/javascript">
    function preventBack() {
        window.history.forward();
    }

    setTimeout("preventBack()", 0);

    window.onunload = function() {
        null
    };
    </script>
</head>

<body>
    <style>
    body {
        width: 90%;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        height: 95vh;
    }

    .form {
        width: 300px;
        height: 300px;
        background: white;
        position: absolute;
        top: 200px;
        left: 380px;
        border: 1px solid maroon;
        border-radius: 10px;
        padding: 20px;


    }

    .form h2 {
        width: 90%;
        font-family: sans-serif;
        text-align: center;
        color: maroon;
        font-size: 22px;
        background-color: white;
        border-radius: 10px;
        margin: 2px;
        padding: 8px;

    }

    .h {
        width: 100%;
        height: 50px;
        background: transparent;
        border: 1px solid maroon;
        border-radius: 10px;
        color: black;
        font-size: 15px;
        letter-spacing: 1px;
        margin-top: 30px;
        font-family: sans-serif;
    }

    .h:focus {
        outline: none;
    }

    ::placeholder {
        color: black;
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
        color: #fff;

    }

    .btnn:hover {
        background: wheat;
        color: black;
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
        color: #fff;
    }

    .form .link a {
        text-decoration: none;
        color: #ff7200
    }

    .helloadmin {
        width: 1500px;
        height: 100%;
        margin-top: 60px;
        text-align: center;
    }

    .helloadmin h1 {
        margin-top: 650px;
        margin-left: -400px;
        display: inline;
        font-family: 'Times New Roman';
        font-size: 50px;
        color: maroon;
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

    <?php
    require_once('../config/constant.php');
    if(isset($_POST['adlog'])){
        $id=$_POST['adid'];
        $pass=$_POST['adpass'];      
        if(empty($id)|| empty($pass))
        {
            echo '<script>alert("please fill the blanks")</script>';
        }
        else{
            $query="select * from admin where AdminID='$id'";
            $res=mysqli_query($conn,$query);
            if($row=mysqli_fetch_assoc($res)){
                $db_password = $row['Password'];
                if($pass  == $db_password)
                { 
                    session_start();
                    $_SESSION['admin_id'] = $id;
                    echo '<script>alert("Welcome ADMINISTRATOR!");</script>';
                    header("location: admin_menu.php");    
                }
                else{
                    echo '<script>alert("Enter a proper password")</script>';
                }
            }
            else{
                echo '<script>alert("enter a proper email")</script>';
            }
        }
    }
?>
    <div class="helloadmin">
        <h1>HELLO ADMIN!</h1>
    </div>
    <form class="form" method="POST">
        <h2>Admin Login</h2>
        <input class="h" type="text" name="adid" placeholder="Enter admin user name">
        <input class="h" type="password" name="adpass" placeholder="Enter admin password">
        <input type="submit" class="btnn" value="LOGIN" name="adlog">
    </form>
</body>

</html>