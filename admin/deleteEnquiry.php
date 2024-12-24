<?php
include('../config/constant.php');

if (isset($_GET['id'])) {
    $eid = $_GET['id'];
    $query = "DELETE FROM enquiry WHERE EID='$eid'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>
            alert('Enquiry deleted successfully');
            window.location.href = 'adminenquiry.php';
        </script>";
    } else {
        echo "<script>
            alert('Failed to delete enquiry');
            window.location.href = 'adminenquiry.php';
        </script>";
    }
}
?>