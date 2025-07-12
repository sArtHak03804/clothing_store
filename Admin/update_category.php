<?php
$category_id=$_GET['category_id'];
include("includes/connection.php");
$query=mysqli_query($conn,"select * from clothing_category where category_id=$category_id");
$row= mysqli_fetch_array($query);


?>
<?php
    include("includes/main_header.php");
      ?>


<?php
       include("includes/preloader.php");
      ?>

<?php
       include("includes/navbar.php");
      ?>
<?php
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
            <h1>CATEGORY</h1>
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
                <h3 class="card-title">ADD CATEGORY</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="" enctype="multipart/form-data"  id="update_category_form">
                <div class="card-body">
                <input type="hidden" name="action_attr" value="update_category_form" >
                <input type="hidden" name="category_id" value="<?php echo $row['category_id']; ?>">

                  <div class="form-group">
                    <label>Add Category title</label>
                    <input type="text" class="form-control"  placeholder="Enter Category name" name="category_title" value="<?php echo $row['category_title']; ?>">
                    </div>
                  <div class="form-group">
                    <label>Add Category description</label>
                    <input type="text" class="form-control"  placeholder="Enter Category description" name="category_description" value="<?php echo $row['category_description']; ?>">
                  </div>
                  <div class="form-group">
                      <label>Add Product thumb</label>
                      <input type="file" class="form-control"  placeholder="Enter product thumb" name="category_thumb">
                      <img src="<?php echo 'category/'.$row['category_thumb']; ?>" height="150px" width="150px" alt="" class="pt-2">
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
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
