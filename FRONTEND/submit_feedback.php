<?php
include('../config/constant.php');
// Fetch feedback from the database
$sql = "SELECT * FROM customer WHERE Feedback IS NOT NULL";
$result = $conn->query($sql);

$feedbacks = [];
while ($row = $result->fetch_assoc()) {
    $feedbacks[] = $row['feedback'];
}

// Based on feedback, recommend bikes
// This is a simplified example, you'd need more complex logic based on your data
$recommendedBikes = [];
foreach ($feedbacks as $feedback) {
    // Your recommendation logic here, e.g., match keywords in feedback to bike features
    // Add recommended bikes to $recommendedBikes array
}

// Display recommended bikes
foreach ($recommendedBikes as $bike) {
    echo "Model: " . $bike['model'] . "<br>";
    echo "Price: $" . $bike['price'] . "<br>";
    echo "Description: " . $bike['description'] . "<br><br>";
}

$conn->close();
?>






<?php
print_r($_POST);die;
  $style = $_POST['row1[0]'];
  $comfort = $_POST['row2[0]'];
  $power = $_POST['row3[0]'];
  $suspension = $_POST['row4[0]'];
  $overall = $_POST['row5[0]'];

  if (count($style) > 1 || count($comfort) > 1 || count($power) > 1 || count($suspension) > 1 || count($overall) > 1) {
    echo "Please select only one option for each row.";
  } else {
   
  }
?>