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
          <div class="col-sm-6">
            <h1>SUB CATEGORY</h1>
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
                <h3 class="card-title">ADD SUB CATEGORY</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post"  id="form3" >
                <div class="card-body">
                <input type="hidden" name="action_attr" value="add_sub_category_form" >

                  <div class="form-group">
                  <label>Category Name</label>
                  <select class="form-control select2" style="width: 100%;" name="category_id">
                  <?php
                  $category_data=mysqli_query($conn,"select * from clothing_category");

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
                      <label>Add Sub-Category title</label>
                      <input type="text" class="form-control"  placeholder="Enter Sub-Category name" name="sub_category_title">
                  </div> 
                  <div class="form-group">
                      <label>Add Sub-Category description</label>
                      <input type="text" class="form-control"  placeholder="Enter Sub-Category description" name="sub_category_description">
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


</body>
</html>
