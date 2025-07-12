<?php
      include("includes/connection.php");

    if(isset($_POST['submit']))
    {
        $admin_username =$_POST['admin_username'];
        $role_id =$_POST['role_id'];
        $admin_email=$_POST['admin_email'];
        $admin_password	=$_POST['admin_password'];
        $retype_password	=$_POST['retype_password'];
        include("includes/connection.php");
        // $select=mysqli_query($conn,"select * from clothing_admin where admin_email = '$admin_email'");
        //  if(mysqli_num_rows($select)>0)
        // {
        //     echo "already exists";
        // }
        // else{
          if($retype_password == $admin_password){
            $query=mysqli_query($conn,"insert into clothing_admin (admin_username,role_id,admin_email,admin_password) values ('$admin_username','$role_id','$admin_email','$admin_password')");
        
        if($query)
        {
          header("Location: login.php");
        }
        else{
            echo "error";
        }
    
      }
      else{
        echo "retype password is wrong";
      }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="index.php" class="h1"><b>Coza</b>store</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="" method="post">
      <div class="form-group">
                  <label>Select Your Role</label>
                  <select class="form-control select2" style="width: 100%;" name="role_id">
                  <?php
                  $role_data=mysqli_query($conn,"select * from clothing_role");

                  while($role_row=mysqli_fetch_array($role_data))
                  {
                    ?>
                    <option value="<?php echo $role_row['role_id']; ?>"><?php echo $role_row['role_title']; ?></option>
                    <?php
                  }
                  ?>
                  </select>
                </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="admin_username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="admin_email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="admin_password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype password" name="retype_password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="submit">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div> -->

      <a href="login.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
