<?php
    include("connection.php");
    
    
    if (isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];
    
        $product_query = mysqli_query($conn, "SELECT * FROM product WHERE product_id='$product_id'");
        // $product_row = mysqli_fetch_array($product_query);
    
        // $product_data = array(
        //     'product_title' => $product_row['product_title'],
        //     'product_price' => $product_row['product_price'],
        //     'product_description' => $product_row['product_description'],
        //     'product_images' => explode(',', $product_row['product_images'])
        // );
    
        while($row = mysqli_fetch_array($product_query)){
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_price = $row['product_price'];
            $product_description = $row['product_description'];        
            $product_images = explode(',', $row['product_images']);
        
            $return_arr[] = array("product_id" => $product_id,
                            "product_title" => $product_title,
                            "product_price" => $product_price,
                            "product_description" => $product_description,
                            "product_images" => $product_images);
        }
    echo json_encode($return_arr); 
    } else {
        echo json_encode(array('error' => 'Product ID is not set!'));
    }
?>
