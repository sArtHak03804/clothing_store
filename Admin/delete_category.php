<?php
   $category_id = $_POST['category_id']; // Change from $_GET to $_POST
   $conn = mysqli_connect("localhost","root","","clothing_db");
   $query = mysqli_query($conn, "DELETE FROM clothing_category WHERE category_id = $category_id");

   if ($query) {
       $result = '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Alert!</h5>
            Success! Successfully Data Inserted..!
          </div>';
        
        echo $result;
   } else {   
     
   $result='<div class="alert alert-danger alert-dismissible">
   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
   <h5><i class="icon fas fa-exclamation-triangle"></i> Error!</h5>
   Oops! Something went wrong. Please try again.
</div>';

echo $result;
   }
?>
