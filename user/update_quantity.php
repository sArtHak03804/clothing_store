<?php
// update_quantity.php
$conn=mysqli_connect("localhost","root","","clothing_db");

include("main_files/session.php");

if ( isset($_POST["product_id"]) && isset($_POST["product_quantity"])) {
    $product_id = $_POST["product_id"];
    $quantity = $_POST["quantity"];

    // Perform database update here, example:
    $updateQuery = "UPDATE shopping_cart SET quantity = '$quantity' WHERE product_id = '$product_id' AND user_id = '$user_id'";
    if (mysqli_query($conn, $updateQuery)) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "error";
}   
?>
