<?php
    include("main_files/connection.php");

if (isset($_POST['submit'])) {
    $username=$_POST['username'];
    $user_email=$_POST['user_email'];
    $address=$_POST['user_billing_address'];
    $contact_no= $_POST['contact_no']; 
    $gender= $_POST['gender'];
    $user_password=$_POST['user_password'];
    $user_copassword=$_POST['user_copassword'];


    $check_query = mysqli_query($conn, "SELECT * FROM clothing_user WHERE user_email='$user_email'");
    $check_username_query = mysqli_query($conn, "SELECT * FROM clothing_user WHERE username='$username'");
    
    if(mysqli_num_rows($check_query) > 0 && mysqli_num_rows($check_username_query) > 0) {
        echo "<script>alert('Error: The email address and username already exist. Please use different credentials.');</script>";
        echo "<script>window.location.href='user_register.php';</script>";
        exit();
    }
    else if(mysqli_num_rows($check_query) > 0) {
        echo "<script>alert('Error: The email address already exists. Please use a different email address.');</script>";
        echo "<script>window.location.href='user_register.php';</script>";
        exit();
    }
    else if(mysqli_num_rows($check_username_query) > 0) {
        echo "<script>alert('Error: The username already exists. Please use a different username.');</script>";
        echo "<script>window.location.href='user_register.php';</script>";
        exit();
    }
    $query = mysqli_query($conn, "INSERT INTO clothing_user (username, user_email,user_billing_address,contact_no,gender, user_password) VALUES ('$username', '$user_email','$address',$contact_no,'$gender', '$user_password')");

    if($query) {
        header("Location:user_login.php");
        exit();
    } else {
        echo "Error in registration: ";
    }
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
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
        <div class="form-outline mb-4">
          <label class="form-label" for="name">Name</label>
          <input type="text" id="name" class="form-control form-control-lg" placeholder="Enter your name" name="username" />
        </div>
        <div class="form-outline mb-4">
          <label class="form-label" for="email">Email address</label>
          <input type="email" id="email" class="form-control form-control-lg" placeholder="Enter a valid email address" name="user_email"/>
        </div>
        <div class="form-outline mb-3">
          <label class="form-label" for="confirm_password">Address</label>
          <input type="text" id="confirm_password" class="form-control form-control-lg" placeholder="Confirm password" name="user_billing_address" />
        </div>
        <div class="form-outline mb-3">
          <label class="form-label" for="confirm_password">Contact-no</label>
          <input type="text" id="confirm_password" class="form-control form-control-lg" placeholder="Confirm password" name="contact_no" />
        </div>
        <div class="form-outline mb-3">
          <label class="form-label" for="confirm_password">Gender</label>
          <input type="text" id="confirm_password" class="form-control form-control-lg" placeholder="Confirm password" name="gender" />
        </div>
        <div class="form-outline mb-3">
          <label class="form-label" for="password">Password</label>
          <input type="password" id="password" class="form-control form-control-lg" placeholder="Enter password" name="user_password"/>
        </div>
        <div class="form-outline mb-3">
          <label class="form-label" for="confirm_password">Confirm Password</label>
          <input type="password" id="confirm_password" class="form-control form-control-lg" placeholder="Confirm password" name="user_copassword" />
        </div>
        <div class="d-flex justify-content-between align-items-center">
          <div class="form-check mb-0">
            <input class="form-check-input me-2" type="checkbox" value="" id="agree_terms" />
            <label class="form-check-label" for="agree_terms">
              I agree to the terms and conditions
            </label>
          </div>
        </div>
        <div class="text-center text-lg-start mt-4 pt-2">
          <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" name="submit">Register</button>
          <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="#!" class="link-danger">Login</a></p>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
