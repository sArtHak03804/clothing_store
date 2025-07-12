<?php
$product_id=$_GET['product_id'];
include("includes/connection.php");
$query=mysqli_query($conn,"select * from product where product_id=$product_id");
$row= mysqli_fetch_array($query);
$category_data=mysqli_query($conn,"select * from clothing_category");
$sub_category_data=mysqli_query($conn,"select * from clothing_sub_category");

?>
<?php
    include("includes/main_header.php");
    include("includes/preloader.php");
    include("includes/navbar.php");
    include("includes/left_aside.php");
?>
                <!-- Main content -->
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>PRODUCT</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="msg"></div>
        <div class="row">
          <!-- Update from -->
          <div class="col">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">ADD PRODUCT</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="" enctype="multipart/form-data" id="update_product_form" >
                <div class="card-body">
                <div class="form-group">

                <input type="hidden" name="action_attr" value="update_product_form" >
                <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                  <label>Category Name</label>
                  <select class="form-control select2" style="width: 100%;" name="category_id">
                  <?php
                  while($category_row=mysqli_fetch_array($category_data))
                  {
                    ?>
                    
                    <option value="<?php echo $category_row['category_id']; ?>" <?php if($category_row['category_id']==$row['category_id']){ echo "selected"; } ?>><?php echo $category_row['category_title']; ?></option>
                    
                  
                    <?php
                  }
                  ?>
                  </select>
                    
                    </div>

                    <div class="form-group">
                  <label>Sub Category Name</label>
                  <select class="form-control select2" style="width: 100%;" name="sub_category_id">
                  <?php
                  while($sub_category_row=mysqli_fetch_array($sub_category_data))
                  {
                    ?>
                    
                    <option value="<?php echo $sub_category_row['sub_category_id']; ?>" <?php if($sub_category_row['sub_category_id']==$row['sub_category_id']){ echo "selected"; } ?>><?php echo $sub_category_row['sub_category_title']; ?></option>
                    
                  
                    <?php
                  }
                  ?>
                  </select>
                    
                    </div>

                  <div class="form-group">
                      <label>Add Product title</label>
                      <input type="text" class="form-control"  placeholder="Enter product name" name="product_title" value="<?php echo $row['product_title']; ?>">
                    </div>
                    <div class="form-group">
                      <label>Add Product thumb</label>
                      <input type="file" class="form-control"  placeholder="Enter product thumb" name="product_thumb">
                      <img src="<?php echo 'uploads/'.$row['product_thumb']; ?>" height="150px" width="150px" alt="" class="pt-2">
                    </div>
                    <div class="form-group">
                      <label>Add Product Imges</label>
                      <input type="file" class="form-control"  placeholder="Enter product images" name="product_images[]" multiple>
                      <?php
                  
                    $imageUrls = explode(',', $row['product_images']);

                    foreach ($imageUrls as $imageUrl) {
                      
                        $fullImagePath = 'uploads/' .($imageUrl);

                      
                        echo '<img src="' . $fullImagePath . '" alt="Product Image" height="80" width="80"> <br><br>';
                    }
                    ?>
                      
                    </div>
                  <div class="form-group">
                        <label for="exampleInputEmail1">Product description</label>
                        <textarea name="product_description" class="form-control" id="" cols="10" rows="5" placeholder="Enter Product description"> <?php echo $row['product_description']; ?></textarea>
                        
                      </div>

                   <div class="form-group">
                        <label for="exampleInputEmail1">Product quantity</label>
                        <input type="text" class="form-control"  placeholder="Enter Product description" name="product_quantity" value="<?php echo $row['product_quantity']; ?>">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Product price</label>
                        <input type="text" class="form-control"  placeholder="Enter Product price" name="product_price" value="<?php echo $row['product_price']; ?>">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">product img</label>
                        <div id="actions" class="row">
                  <div class="col-lg-6">
                    <div class="btn-group w-100">
                      <span class="btn btn-success col fileinput-button">
                        <i class="fas fa-plus"></i>
                        <span>Add files</span>
                      </span>
                      <button type="submit" class="btn btn-primary col start">
                        <i class="fas fa-upload"></i>
                        <span>Start upload</span>
                      </button>
                      <button type="reset" class="btn btn-warning col cancel">
                        <i class="fas fa-times-circle"></i>
                        <span>Cancel upload</span>
                      </button>
                    </div>
                  </div>
                  <div class="col-lg-6 d-flex align-items-center">
                    <div class="fileupload-process w-100">
                      <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                        <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="table table-striped files" id="previews">
                  <div id="template" class="row mt-2">
                    <div class="col-auto">
                        <span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
                    </div>
                    <div class="col d-flex align-items-center">
                        <p class="mb-0">
                          <span class="lead" data-dz-name></span>
                          (<span data-dz-size></span>)
                        </p>
                        <strong class="error text-danger" data-dz-errormessage></strong>
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <div class="progress progress-striped active w-100" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                          <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                        </div>
                    </div>
                    <div class="col-auto d-flex align-items-center">
                      <div class="btn-group">
                        <button class="btn btn-primary start">
                          <i class="fas fa-upload"></i>
                          <span>Start</span>
                        </button>
                        <button data-dz-remove class="btn btn-warning cancel">
                          <i class="fas fa-times-circle"></i>
                          <span>Cancel</span>
                        </button>
                        <button data-dz-remove class="btn btn-danger delete">
                          <i class="fas fa-trash"></i>
                          <span>Delete</span>
                        </button>
                      </div>
                    </div>
                  </div>
              </div>
                      </div>

                
                                 
                    
                </div>
                        
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>        
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
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
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
