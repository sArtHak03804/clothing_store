<?php
session_start();
include("includes/connection.php");
$query = mysqli_query($conn, "SELECT * FROM placeorder WHERE status=0 ORDER BY created_date DESC");
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

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<?php
include("includes/main_header.php");
include("includes/preloader.php");
include("includes/navbar.php");
include("includes/left_aside.php");
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DataTables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="msg"></div>
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                            <div>
                                <ol class=" float-right">
                                    <button><i class="far fa-edit nav-icon"></i><a href="category_add_form.php">ADD CATEGORY</a></button>
                                </ol>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Order Id</th>
                                        <th>User ID</th>
                                        <th>Product Title</th>
                                        <th>Total</th>
                                        <th>Ordered Date</th>
                                        <th>View Orders</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_array($query)) {
                                        $product_id = $row['product_id'];
                                        $product_result = mysqli_query($conn, "SELECT * FROM product WHERE product_id = $product_id");
                                        $product_info = mysqli_fetch_array($product_result);
                                        $subtotal = $row['quantity'] * $product_info['product_price'];
                                    ?>
                                        <tr>
                                            <td><?php echo $row['order_id']; ?></td>
                                            <td><?php echo $row['user_id']; ?></td>
                                            <td><?php echo $product_info['product_title']; ?></td>
                                            <td><?php echo $subtotal; ?></td>
                                            <td><?php echo $row['created_date']; ?></td>
                                            <td><!-- Scrollable modal -->
                                              <button type="button" class="btn btn-primary view-order-btn" data-product-id="<?php echo $product_id; ?>" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                View order
                                            </button>
                                            </td>

                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    <div class="modal-body" id="modalContent"></div>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
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


<body>

</body>
</html>
