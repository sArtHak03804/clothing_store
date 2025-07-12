<?php
include("includes/connection.php");

    $category_title=$_POST['category_title'];
    $category_description=$_POST['category_description'];
    $category_thumb=$_FILES['category_thumb']['name'];
    $category_temp_thumb=$_FILES['category_thumb']['tmp_name'];

    $path="category/";
    move_uploaded_file($category_temp_thumb,$path.$category_thumb);
   
    $query=mysqli_query($conn,"insert into clothing_category(category_title,category_description,category_thumb) values ('$category_title','$category_description','$category_thumb')");
    if($query)
        {
            $result='<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Alert!</h5>
            Success! Successfully Data Inserted..!
          </div>';
          echo $result;
          exit;

        }

?>