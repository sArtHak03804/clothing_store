<?php 
include("includes/connection.php"); 

// Check if product_id is set and is a valid integer
if(isset($_POST['product_id']) && is_numeric($_POST['product_id'])) {
    // Sanitize input
    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);

    // Query to fetch product details based on the product_id
    $query = mysqli_query($conn, "SELECT * FROM product WHERE product_id = $product_id");

    // Check if query was successful
    if($query && mysqli_num_rows($query) > 0) {
        // Fetching product details
        while ($row = mysqli_fetch_array($query)) { 
            $category_data=mysqli_query($conn,"SELECT * FROM clothing_category WHERE category_id=$row[category_id]");
            $category_row=mysqli_fetch_array($category_data);
            $sub_category_data=mysqli_query($conn,"SELECT * FROM clothing_sub_category WHERE sub_category_id=$row[sub_category_id]");
            $sub_category_row=mysqli_fetch_array($sub_category_data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <!-- Add your CSS and JavaScript links here -->
    <?php include("includes/main_header.php"); ?>
</head>
<body>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 153%;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> <i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <table class="table table-striped bordered ">
                    <tr>
                        <th>Category</th>
                        <th>Sub-Category</th>
                        <th>Title</th>
                        <th>Thumbnail</th>
                        <th>Images</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                    <tr>
                        <td><?php echo $category_row['category_title']; ?></td>
                        <td><?php echo $sub_category_row['sub_category_title']; ?></td>
                        <td><?php echo $row['product_title']; ?></td>
                        <td><img src="<?php echo 'uploads/' . $row['product_thumb']; ?>" alt="Product Thumbnail" height="70px" width="80px"></td>
                        <td>
                            <?php
                            $imageUrls = explode(',', $row['product_images']);
                            foreach ($imageUrls as $imageUrl) {
                                $fullImagePath = 'uploads/' . $imageUrl;
                                echo '<img src="' . $fullImagePath . '" alt="Product Image" height="80" width="80"> <br><br>';
                            }
                            ?>
                        </td>
                        <td><?php echo $row['product_description']; ?></td>
                        <td><?php echo $row['product_price']; ?></td>
                        <td><?php echo $row['product_quantity']; ?></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Add your additional HTML content or footer here -->
</body>
</html>
<?php 
        }
    } else {
        echo "No product found!";
    }
} else {
    echo "Invalid product ID!";
}
?>
