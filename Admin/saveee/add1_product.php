<?php

include("includes/connection.php");


$category_data=mysqli_query($conn,"select * from clothing_category");
$sub_category_data=mysqli_query($conn,"select * from clothing_sub_category");

    $category_id=$_POST['category_id'];
    $sub_category_id=$_POST['sub_category_id'];
    $product_title=$_POST['product_title'];
    $product_thumb=$_FILES['product_thumb']['name'];
    $product_temp_thumb=$_FILES['product_thumb']['tmp_name'];
    $path="uploads/";
    move_uploaded_file($product_temp_thumb,$path.$product_thumb);

    $product_images_concate=implode(',',$_FILES["product_images"]["name"]);
    foreach($_FILES["product_images"]["name"] as $key=>$tmp_name) {
      $product_images=$_FILES["product_images"]["name"][$key];
      $product_temp_images=$_FILES["product_images"]["tmp_name"][$key];
      move_uploaded_file($product_temp_images,$path.$product_images);
    }


    $product_description=$_POST['product_description'];
    $product_quantity=$_POST['product_quantity'];
    $product_price=$_POST['product_price'];
    $query=mysqli_query($conn,"insert into product (category_id,sub_category_id,product_title,product_thumb,product_images,product_description,product_price,product_quantity) values ($category_id,$sub_category_id,'$product_title','$product_thumb','$product_images_concate','$product_description','$product_price',$product_quantity)");
 //   echo "insert into product (category_id,sub_category_id,product_title,product_thumb,product_images,product_description,product_price,product_quantity) values ($category_id,$sub_category_id,'$product_title','$product_thumb','$product_images_concate','$product_description','$product_price',$product_quantity)";
    if($query)
        {
            $result='<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Alert!</h5>
            Success! Successfully Data Inserted..!
          </div>';
          echo $result;
          
        }

        
    else{
      echo "error";
    }
?>