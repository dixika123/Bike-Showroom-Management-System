<?php
include('userclass.php');
include('../bookingNav.php');
include('../config/constant.php');

function isLoggedin(){
    return isset($_SESSION['email']);
}

// Fetch accessories
$fetch=new accessories($conn);
$result=$fetch->getAccessories();
$accessories = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<div class="contain">
    <?php foreach ($accessories as $accessory): ?>
    <?php if($accessory['available'] == 'Y'): // Only show available accessories ?>
    <div class="cards">
        <img src="../images/<?php echo $accessory['accessory_image']; ?>" alt="">
        <div class="card-content">
            <h3><?php echo $accessory['accessory_name']; ?></h3>
            <p> Rs.<?php echo $accessory['price']; ?></p>
            <a href="accessoriesform.php?AID=<?php echo $accessory['AID']; ?>" class="btn-link"
                onclick="showOrderForm('<?php echo $accessory['AID']; ?>', '<?php echo $accessory['price']; ?>', '<?php echo $accessory['accessory_name']; ?>')">Order
                Now</a>
        </div>
    </div>
    <?php endif; ?>
    <?php endforeach; ?>
</div>

<script>
function showOrderForm(aid, price, name) {
    document.getElementById('aid').value = aid;
    document.getElementById('price').value = price;
    document.getElementById('name').value = name;
    document.getElementById('orderFormContainer').style.display = 'block';
}
</script>
<style>
* {
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
    font-family: sans-serif;
}

body {
    background-color: #ddd;
}

.contain {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    margin-top: 50px;
}

.cards {
    width: 325px;
    height: auto;
    margin: 20px;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
    border-radius: 8px;
    background-color: #eee;
    overflow: hidden;
}

.cards img {
    width: 100%;
    height: auto;
    object-fit: cover;
}

.card-content {
    padding: 20px;
}

.card-content h3 {
    color: maroon;
    font-size: 24px;
    margin-bottom: 10px;
}

.card-content p {
    color: #666;
    font-size: 16px;
    margin-bottom: 15px;
    line-height: 1.4;
}

.btn-link {
    display: inline-block;
    padding: 10px 20px;
    background-color: maroon;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: 0.4s ease;
}

.btn-link:hover {
    background-color: green;
}
</style>

<?php
include('../footer.php');
?>