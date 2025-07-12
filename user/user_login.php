<?php 
session_start();
include("main_files/connection.php");


if(isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) {
    header("Location: index.php");
    exit();
}
$conn=mysqli_connect("localhost","root","","clothing_db");

if (isset($_POST['submit'])) {
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];

    $query = mysqli_query($conn, "SELECT * FROM clothing_user WHERE user_email = '$user_email' AND user_password = '$user_password'");

    if (mysqli_num_rows($query) > 0) {
        $user_data = mysqli_fetch_array($query);
        session_start();
        $_SESSION['user_id'] = $user_data['user_id'];
        $_SESSION['user_email'] = $user_data['user_email'];
          echo  $_SESSION['user_id'];
        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('Invalid email address or password. Please try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.0/css/all.min.css" integrity="sha512-UJqci0ZyYcQ0AOJkcIkUCxLS2L6eNcOr7ZiypuInvEhO9uqIDi349MEFrqBzoy1QlfcjfURHl+WTMjEdWcv67A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="container-fluid">
  <div class="row vh-100 justify-content-center align-items-center">
    <div class="col-md-9 col-lg-6 col-xl-5">
      <img src="images/lg.jpg" class="img-fluid" alt="Sample image">
    </div>
    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
      <form method="post">
        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
          <p class="lead fw-normal mb-0 me-3">Sign in with</p>
          <button type="button" class="btn btn-primary btn-floating mx-1">
            <i class="fab fa-facebook-f"></i>
          </button>
          <button type="button" class="btn btn-primary btn-floating mx-1">
            <i class="fab fa-twitter"></i>
          </button>
          <button type="button" class="btn btn-primary btn-floating mx-1">
            <i class="fab fa-linkedin-in"></i>
          </button>
        </div>
        <div class="divider d-flex align-items-center my-4">
          <p class="text-center fw-bold mx-3 mb-0">Or</p>
        </div>

        <div class="form-outline mb-4">
          <input type="email" id="form3Example3" class="form-control form-control-lg" placeholder="Enter a valid email address" name="user_email"/>
          <label class="form-label" for="form3Example3">Email address</label>
        </div>

        <div class="form-outline mb-3">
          <input type="password" id="form3Example4" class="form-control form-control-lg" placeholder="Enter password" name="user_password"/>
          <label class="form-label" for="form3Example4">Password</label>
        </div>
        <div class="text-center text-lg-start mt-4 pt-2">
          <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" name="submit">Login</button>
          <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="user_register.php" class="link-danger">Register</a></p>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
