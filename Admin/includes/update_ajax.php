<?php
include("connection.php");

$action_attr = $_POST['action_attr'];

if ($action_attr == "update_role_form") {
    $role_id = $_POST['role_id'];
    $role_title = $_POST['role_title'];
    $update = mysqli_query($conn, "UPDATE clothing_role SET role_title='$role_title' WHERE role_id=$role_id");

    if ($update) {
        $result = '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Alert!</h5>
                    Success! Role updated successfully.
                  </div>';
    } else {
        $result = '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-times"></i> Alert!</h5>
                    Error! Failed to update role.
                  </div>';
    }
} 

//role

elseif ($action_attr == "update_category_form") {
    $category_id = $_POST['category_id'];
    $category_title = $_POST['category_title'];
    $category_description = $_POST['category_description'];
    $category_thumb = $_FILES['category_thumb']['name'];

    // Handle file upload if a new image is selected
    if (!empty($_FILES['category_thumb']['name'])) {
        $category_temp_thumb = $_FILES['category_thumb']['tmp_name'];
        $path = "../category/";
        move_uploaded_file($category_temp_thumb, $path . $category_thumb);
    }

    $update = mysqli_query($conn, "UPDATE clothing_category SET category_title='$category_title', category_description='$category_description', category_thumb='$category_thumb' WHERE category_id=$category_id");

    if ($update) {
        $result = '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Alert!</h5>
                    Success! Category updated successfully.
                  </div>';
    } else {
        $result = '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-times"></i> Alert!</h5>
                    Error! Failed to update category.
                  </div>';
    }
}

//category


elseif ($action_attr == "update_sub_category_form")
{
  //if(isset($_POST['submit']))
  $sub_category_id=$_POST['sub_category_id'];
       $category_id=$_POST['category_id'];
       $sub_category_title=$_POST['sub_category_title'];
       $sub_category_description=$_POST['sub_category_description'];
      $update=mysqli_query($conn,"update clothing_sub_category set category_id=$category_id,sub_category_title='$sub_category_title',sub_category_description='$sub_category_description' where sub_category_id=$sub_category_id");
      if($update)
     {
         $result='<div class="alert alert-success alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
         <h5><i class="icon fas fa-check"></i> Alert!</h5>
         Success! Successfully Data Inserted..!
       </div>';
     }
     else {
      $result = '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-times"></i> Alert!</h5>
                  Error! Failed to update sub_category.
                </div>';
  }
}

//sub_category




elseif ($action_attr == "update_product_form") {
  $product_id = $_POST['product_id'];

  if (!empty($product_id)) {
      $category_id = $_POST['category_id'];
      $sub_category_id = $_POST['sub_category_id'];
      $product_title = $_POST['product_title'];
      $product_description = $_POST['product_description'];
      $product_quantity = $_POST['product_quantity'];
      $product_price = $_POST['product_price'];

      $row = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM product WHERE product_id=$product_id"));
      $product_thumb = $row['product_thumb'];
      $product_images = $row['product_images'];

      // Handle product thumbnail update
      if (!empty($_FILES['product_thumb']['name'])) {
          $product_thumb = $_FILES['product_thumb']['name'];
          move_uploaded_file($_FILES['product_thumb']['tmp_name'], "uploads/" . $product_thumb);
      }

      // Handle product images update
      $uploaded_images = [];
      if (!empty($_FILES['product_images']['name'][0])) {
          foreach ($_FILES['product_images']['name'] as $key => $image) {
              $tmp_name = $_FILES['product_images']['tmp_name'][$key];
              $uploaded_images[] = $image;
              move_uploaded_file($tmp_name, "uploads/" . $image);
          }
          $product_images = implode(',', $uploaded_images);
      }

      // Update the product in the database
      $update_query = "UPDATE product SET category_id=$category_id, sub_category_id=$sub_category_id, product_title='$product_title', product_description='$product_description', product_quantity=$product_quantity, product_price='$product_price', product_thumb='$product_thumb', product_images='$product_images' WHERE product_id=$product_id";
      $update_result = mysqli_query($conn, $update_query);

      if ($update_result) {
          $result = '<div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                          <h5><i class="icon fas fa-check"></i> Alert!</h5>
                          Success! Product updated successfully.
                      </div>';
      } else {
          $result = '<div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                          <h5><i class="icon fas fa-times"></i> Alert!</h5>
                          Error! Failed to update product.
                      </div>';
      }
  } else {
      $result = '<div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="icon fas fa-times"></i> Alert!</h5>
                      Error! Product ID is empty.
                  </div>';
  }

  echo $result;
}


else {
    $result = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-times"></i> Alert!</h5>
                Error! Invalid action.
              </div>';
}

echo $result;
?>
