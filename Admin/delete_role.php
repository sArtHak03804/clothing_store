<?php
   $role_id=$_GET['role_id'];
   include("includes/connection.php");
   $query=mysqli_query($conn,"delete from clothing_role where role_id=$role_id");
   if($query)
   {
    header("Location:all_roles_db.php");
   }
   else{
    echo "error";
   }
?>