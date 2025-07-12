<?php
session_start();
include("includes/connection.php");
    $select = mysqli_query($conn, "SELECT * FROM clothing_admin WHERE admin_id = '{$_SESSION['admin_id']}'");
    if ($select) {
        $admin_data = mysqli_fetch_array($select);
    
        $role_query = mysqli_query($conn, "SELECT * FROM clothing_role WHERE role_id = '{$admin_data['role_id']}'");
        if ($role_query) {
            $role_data = mysqli_fetch_array($role_query);
            $user_role = $role_data['role_title'];
        } else {
            $user_role = "Default Role";
            echo "Error fetching user role: " . mysqli_error($conn);
        }
    } else {
        // Handle the case where the query for user data fails
        // For example:
        echo "Error fetching user data: " . mysqli_error($conn);
    }    
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <title></title>
</head>
<?php
    include("includes/main_header.php");
    include("includes/preloader.php");
    include("includes/navbar.php");
    include("includes/left_aside.php");
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="msg"></div>
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
                <div>
                    <ol class=" float-right">
                    <button><i class="far fa-edit nav-icon"></i><a href="add_product.php">ADD PRODUCTS</a></button>
                   </ol>
                </div>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Category Title</th>
                    <th>Sub Category Title</th>
                    <th>Product Name</th>
                    <th>Product thumb</th>
                    <th>Product Images</th>
                    <th>Product description</th>
                    <th>Product price</th>
                    <th>Product Quantity</th>
                    <?php if ($user_role=="Admin"||$user_role=="Super Admin"){?>
                    <th>Delete</th>
                    <?php }?>
                    <th>edit</th>
                 </tr>
                  </thead>
                  <tbody>
                  
              <?php
                  $query=mysqli_query($conn,"SELECT * from product");

            while($row= mysqli_fetch_array($query))
            {
                $category_data=mysqli_query($conn,"select * from clothing_category where category_id=$row[category_id]");
                $category_row=mysqli_fetch_array($category_data);
                $sub_category_data=mysqli_query($conn,"select * from clothing_sub_category where sub_category_id=$row[sub_category_id]");
                $sub_category_row=mysqli_fetch_array($sub_category_data);
        ?>
        
            
                <tr>
                <td>
                    <?php echo $category_row['category_title'];
                     ?>
                </td>
                <td>
                    <?php echo $sub_category_row['sub_category_title'];
                     ?>
                </td>
                  <td>
                    <?php echo $row['product_title'] ;
                     ?>
                </td>
                <td><img src="<?php echo 'uploads/'.$row['product_thumb']; ?>" alt="Product Thumbnail" height="70px" width="80px" ></td>
                <td> 
                    <?php
                  
                    $imageUrls = explode(',', $row['product_images']);

                    foreach ($imageUrls as $imageUrl) {
                      
                        $fullImagePath = 'uploads/' .($imageUrl);

                      
                        echo '<img src="' . $fullImagePath . '" alt="Product Image" height="80" width="80"> <br><br>';
                    }
                    ?>
                    </td>
                <td>
                    <?php echo $row['product_description'] ;
                     ?> 
                </td>
                <td>
                    <?php echo $row['product_price'] ;
                     ?> 
                </td>
                <td>
                    <?php echo $row['product_quantity'] ;
                     ?> 
                </td>
                <?php if ($user_role=="Admin"||$user_role=="Super Admin"){?>
                <td><a href="#" data-id="<?php echo $row['product_id'];?>" class="delete_product"><i class="fa-solid fa-trash-can-arrow-up"></i></a></td>
                               <?php }?>   
<td><a href= "update_product.php?product_id=<?php echo $row['product_id']?>"><i class="fa-solid fa-pencil"></i></a></td>
   
              </tr>
                  <?php
                     }
                     ?>
                     
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php
  include("includes/footer.php");
?>

  <!-- Control Sidebar -->
  <?php
  include("includes/right_aside.php");
?>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php
  include("includes/main_footer.php");
?>


<body>
    
</body>
</html>