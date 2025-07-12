<?php 
 include("main_files/session.php");
 include("main_files/connection.php");
 
 $cart_id = $_POST['cart_id'];
 if(isset($_POST['cart_id'])) 
 {
    $delete_query = mysqli_query($conn, "DELETE FROM shopping_cart WHERE cart_id =$cart_id");
    if($delete_query) {
        // Deletion was successful
        echo "Product deleted successfully.";
    } else {
        // Deletion failed
        echo "Failed to delete product.";
    }
} else {
    // If cart_id is not provided or empty
    echo "Invalid request. Please provide a valid cart ID.";
}
 
?>