<?php
include("includes/connection.php");
$category_data=mysqli_query($conn,"select * from clothing_category");

  $category_id=$_POST['category_id'];
    $sub_category_title=$_POST['sub_category_title'];
    $sub_category_description=$_POST['sub_category_description'];
    $query=mysqli_query($conn,"insert into clothing_sub_category(category_id,sub_category_title,sub_category_description) values ($category_id,'$sub_category_title','$sub_category_description')");
    if($query)
        {
            $result='<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Alert!</h5>
            Success! Successfully Data Inserted..!
          </div>';
        }
        echo $result;

?>