<?php 
include("main_files/session.php");

$conn=mysqli_connect("localhost","root","","clothing_db");

$delete_query = mysqli_query($conn, "DELETE FROM shopping_cart WHERE user_id=$user_id");
$affected_rows = mysqli_affected_rows($conn);
echo $affected_rows; 
if ($affected_rows > 0) {
    echo "hii";
} else {
    echo "hiiii";
}
?>