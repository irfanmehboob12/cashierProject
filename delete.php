<?php
include('dbconnection.php');

$sql = "DELETE FROM transactions WHERE tid='" . $_GET["userid"] . "'";
if (mysqli_query($conn, $sql)) {
    header("Location: index.php",TRUE,301);
    exit();

} else {
    echo "Error deleting record: " . mysqli_error($conn);
}


?>