<?php
    include("includes/connection.php");     
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
          <div class="col">
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
          <!-- left column -->
          <div class="col">
            <!-- general form elements -->
            
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">ADD PRODUCT</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data" id="form1">
                <div class="card-body">
                <div class="form-group">
            <input type="hidden" name="action_attr" value="add_product_form" >
                <label>Category Name</label>
                  <select class="form-control select2" style="width: 100%;" name="category_id">
                  <?php  
                    $category_data=mysqli_query($conn,"select * from clothing_category");
                    $sub_category_data=mysqli_query($conn,"select * from clothing_sub_category");
                  while($category_row=mysqli_fetch_array($category_data))
                  {
                    ?>
                    
                    <option value="<?php echo $category_row['category_id']; ?>"><?php echo $category_row['category_title']; ?></option>
                    
                  
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
                    
                    <option value="<?php echo $sub_category_row['sub_category_id']; ?>"><?php echo $sub_category_row['sub_category_title']; ?></option>
                    
                  
                    <?php
                  }
                  ?>
                  </select>
                    
                    </div>

                  <div class="form-group">
                      <label>Add Product title</label>
                      <input type="text" class="form-control"  placeholder="Enter product name" name="product_title">
                    </div>
                    <div class="form-group">
                      <label>Add Product thumb</label>
                      <input type="file" class="form-control"  placeholder="Enter product thumb" name="product_thumb">
                    </div>
                    <div class="form-group">
                      <label>Add Product Imges</label>
                      <input type="file" class="form-control"  placeholder="Enter product images" name="product_images[]" multiple>
                    </div>
                  <div class="form-group">
                        <label for="exampleInputEmail1">Product description</label>
                        <textarea name="product_description" class="form-control" id="" cols="10" rows="5" placeholder="Enter Product description"></textarea>
                        
                      </div>

                   <div class="form-group">
                        <label for="exampleInputEmail1">Product quantity</label>
                        <input type="text" class="form-control"  placeholder="Enter Product description" name="product_quantity">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Product price</label>
                        <input type="text" class="form-control"  placeholder="Enter Product price" name="product_price">
                      </div>

                      
                
                                 
                    
                </div>
                        
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            <!-- general form elements -->
            
            
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
        
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
 

  <!-- script start  -->





<!-- ./wrapper -->
<?php

  include("includes/footer.php");
?>
<div>
  <!-- Control Sidebar -->
  <?php
  include("includes/right_aside.php");
?>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
</div>

<script>
$(function () {
  bsCustomFileInput.init();
});
</script>

<?php
  include("includes/main_footer.php");
?>




</body>
</html>
