
<?php
    include("includes/main_header.php");
    include("includes/preloader.php");
    include("includes/navbar.php");
    include("includes/left_aside.php");
    include("includes/connection.php");

    $role_id=$_GET['role_id'];
    $query=mysqli_query($conn,"select * from clothing_role where role_id=$role_id");
    $row= mysqli_fetch_array($query);


?>
                <!-- Main content -->
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ADD ROLE</h1>
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
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">ADD ROLE</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post"  id="update_role_form" >
                <div class="card-body">
                <input type="hidden" name="action_attr" value="update_role_form" >
                <input type="hidden" name="role_id" value="<?php echo $row['role_id']; ?>">

                  <div class="form-group">
                    <label>Add role name</label>
                    <input type="text" class="form-control"  placeholder="Enter role name" name="role_title" value="<?php echo $row['role_title']; ?>">
                  </div>
                                 
                    
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button  class="btn btn-primary" data-id="<?php echo $row['role_id'];?>" name="submit">Submit</button>
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
