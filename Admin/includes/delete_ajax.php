<?php 
  include("connection.php");
  $action = $_POST['action_value'];
if ($action === 'delete_cat') {
    $category_id = $_POST['category_id'];
    $query = mysqli_query($conn, "DELETE FROM clothing_category WHERE category_id = $category_id");

    if ($query) {
        echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                Category deleted successfully!
              </div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Error!</h5>
                Error deleting category. Please try again.
              </div>';
    }
}

 else  if ($action === 'delete_sub_cat') {
   $sub_category_id = $_POST['sub_category_id'];
   $query = mysqli_query($conn, "DELETE FROM clothing_sub_category WHERE sub_category_id = $sub_category_id");

   if ($query) {
       echo '<div class="alert alert-success alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h5><i class="icon fas fa-check"></i> Success!</h5>
               Sub-category deleted successfully!
             </div>';
   } else {
       echo '<div class="alert alert-danger alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h5><i class="icon fas fa-exclamation-triangle"></i> Error!</h5>
               Error deleting sub-category. Please try again.
             </div>';
   }
}

else if ($action === 'delete_role') {
    $role_id = $_POST['role_id'];
    $query = mysqli_query($conn, "DELETE FROM clothing_role WHERE role_id = $role_id");

    if ($query) {
        echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                Role deleted successfully!
              </div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Error!</h5>
                Error deleting role. Please try again.
              </div>';
    }
}


else if ($action === 'delete_product') {
    $product_id = $_POST['product_id'];
    // Fetch product data to get file information
    $product_data = mysqli_query($conn, "SELECT * FROM product WHERE product_id = $product_id");
    $product_row = mysqli_fetch_array($product_data);
    $product_thumb = "../uploads/" . $product_row['product_thumb'];
    $product_images = $product_row['product_images'];
    $delete_images = explode(',', $product_row['product_images']);

    foreach ($delete_images as $image) {
        $image_path = "../uploads/" . $image;
        if (file_exists($image_path)) {
            unlink($image_path);
        } else {
            echo 'Could not delete ' . $image . ', file does not exist';
        }
    }

    if (file_exists($product_thumb)) {
        unlink($product_thumb);
        //echo 'File ' . $product_thumb . ' has been deleted';
    } else {
        echo 'Could not delete ' . $product_thumb . ', file does not exist';
    }

    $query = mysqli_query($conn, "DELETE FROM product WHERE product_id = $product_id");

    if ($query) {
        echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                Product deleted successfully!
              </div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Error!</h5>
                Error deleting product. Please try again.
              </div>';
    }
}

?>