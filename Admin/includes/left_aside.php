<?php 
include("includes/main_header.php");
include("includes/connection.php");
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

$select = mysqli_query($conn, "SELECT * FROM clothing_admin WHERE admin_id = '{$_SESSION['admin_id']}'");
if ($select) {
    $admin_data = mysqli_fetch_array($select);

    $role_query = mysqli_query($conn, "SELECT * FROM clothing_role WHERE role_id = '{$admin_data['role_id']}'");
    if ($role_query) {
        $role_data = mysqli_fetch_array($role_query);
        $user_role = $role_data['role_title'];
    } else {
        $user_role = "Default Role";
        echo "Error fetching user role: " . mysqli_error($conn);
    }
} else {
    // Handle the case where the query for user data fails
    // For example:
    echo "Error fetching user data: " . mysqli_error($conn);
}
?>

<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo $user_role; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['admin_username'] ;?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <?php 
               if($user_role=="Admin"||$user_role=="Editor"||$user_role=="Super Admin")
               {
               ?>
          <li class="nav-item">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashbord
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Roles
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_role_form.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Role</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="all_roles_db.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All roles</p>
                </a>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="category_add_form.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="all_category_db.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All category</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Sub Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_sub_category_form.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Sub Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="all_sub_category_db.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Sub Category</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Product
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_product.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="all_product.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Product</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
                <a href="all_orders.php" class="nav-link">
                <i class="fa fa-eye" aria-hidden="true"></i>
                  <p> View All orders</p>
                </a>
              </li>

          </ul>
          <?php 
                } else {
                    
                    echo '<li class="nav-item">
                    <a href="add_product.php" class="nav-link">
                      <p>No Access</p>
                    </a>
                  </li>';
                }
                ?>
         
          
                    
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
