<?php
include("../config/constant.php");
$aid=$_GET['AID'];

$sql="select * from accessories where AID=$aid";
$res=$conn->query($sql);
$info=$res->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    #orderFormContainer {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 300px;
    }

    form div {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="number"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    button[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #28a745;
        border: none;
        border-radius: 4px;
        color: white;
        font-size: 16px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #218838;
    }
    </style>
</head>

<body>
    <div id="orderFormContainer">

        <form id="orderForm" method="post" action="../admin/khaltipay.php?id=<?php echo $aid; ?>&source=page2">
            <input type="hidden" id="aid" name="AID" value="<?php echo $info['AID'];?>">
            <input type="hidden" id="price" name="price" value="<?php echo $info['price'];?>">
            <input type="hidden" id="order_date" name="order_date" value="<?php echo date('Y-m-d'); ?>">
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="Name" value="<?php echo $info['accessory_name'];?>" disabled>
            </div>
            <div>
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" required>
            </div>
            <div>
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" value="1" required>
            </div>
            <button type="submit">Place Order</button>
        </form>
    </div>

</body>

</html>