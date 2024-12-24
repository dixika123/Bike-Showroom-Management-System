<?php
// Database connection
$mysqli = new mysqli("localhost", "username", "password", "bike_showroom");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Function to get bike recommendations
function getBikeRecommendations($customer_id, $mysqli) {
    // Fetch the customer's highest rated bikes
    $query = "SELECT bike_id FROM feedback WHERE customer_id = $customer_id ORDER BY rating DESC LIMIT 5";
    $result = $mysqli->query($query);
    
    $preferred_bikes = [];
    while ($row = $result->fetch_assoc()) {
        $preferred_bikes[] = $row['bike_id'];
    }
    
    if (empty($preferred_bikes)) {
        return [];
    }

    // Fetch details of the preferred bikes
    $preferred_bike_ids = implode(',', $preferred_bikes);
    $query = "SELECT * FROM bikes WHERE bike_id IN ($preferred_bike_ids)";
    $result = $mysqli->query($query);
    
    $bike_details = [];
    while ($row = $result->fetch_assoc()) {
        $bike_details[] = $row;
    }

    // Generate recommendations based on preferred bikes
    $recommendations = [];
    foreach ($bike_details as $bike) {
        $query = "SELECT * FROM bikes WHERE type = '" . $bike['type'] . "' AND brand = '" . $bike['brand'] . "' AND bike_id NOT IN ($preferred_bike_ids)";
        $result = $mysqli->query($query);
        
        while ($row = $result->fetch_assoc()) {
            $recommendations[] = $row;
        }
    }
    
    return $recommendations;
}

// yo function baheko bujya chau ki nai aru ? bujhe tara yo code ka rakhne ho yo pakha hai home page load huda yo code ran vaye aaucha as hamile home page ma ho haina recommend garne ? haina feedback submit bhae sake pachi tala tira eh okay teha ni milcha teso vaye feedback sumit vaye chi yo code run garne]
// yo feedback.php ma rakhne teso bhaye umm aaile chai analyze garne hamro sanga milcha ki nai vanerw
// Example usage

$customer_id = 1; // The customer ID for which to get recommendations or id of the current logged in user
$recommendations = getBikeRecommendations($customer_id, $mysqli);

echo "<h1>Recommended Bikes</h1>";
foreach ($recommendations as $bike) {
    echo "<p>Model: {$bike['model']}, Brand: {$bike['brand']}, Type: {$bike['type']}, Price: {$bike['price']}</p>";
}

$mysqli->close();
?>
