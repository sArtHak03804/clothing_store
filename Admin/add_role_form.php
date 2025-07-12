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
        <div class="msg"></div>
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
              <form method="post"  id="form2" >
                <div class="card-body">
                <input type="hidden" name="action_attr" value="add_role_form" >

                  <div class="form-group">
                    <label>Add role name</label>
                    <input type="text" class="form-control"  placeholder="Enter role name" name="role_title">
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
