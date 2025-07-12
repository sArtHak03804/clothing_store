<?php
   $product_id=$_GET['product_id'];
   include("includes/connection.php");
   $product_data=mysqli_query($conn,"select * from product where product_id=$product_id");
   $product_row=mysqli_fetch_array($product_data);
   $product_thumb="uploads/".$product_row['product_thumb'];
   $product_images=$product_row['product_images'];
   $delete_images = explode(',', $product_row['product_images']);
    foreach ($delete_images as $image) {
        if (file_exists("uploads/".$image)) {
            unlink("uploads/".$image);
            echo 'File '.$image.' has been deleted';
          } else {
            echo 'Could not delete '.$product_images.', file does not exist';
          }
          
        }
        
   if (file_exists($product_thumb)) {
    unlink($product_thumb);
    echo 'File '.$product_thumb.' has been deleted';
  } else {
    echo 'Could not delete '.$product_thumb.', file does not exist';
  }
  $query=mysqli_query($conn,"delete from product where product_id=$product_id");
   if($query)
   {
    header("Location:all_product.php");
   }
   else{
    echo "error";
   }

   
?>