<?php 
    include("main_files/session.php");
    include("main_files/connection.php");

    // Handle cart update form submission
    if(isset($_POST['update_cart'])) {
        $cart_query = mysqli_query($conn, "SELECT * FROM `shopping_cart` WHERE  `user_id` = '$user_id'");
        
        while ($cart_data = mysqli_fetch_array($cart_query)) { 
            $product_id = $cart_data['product_id']; 
            $product_quantity = $_POST['quantity_'.$product_id];

            if ($product_quantity != $cart_data['quantity']) {
                if($product_quantity == 0) {
                    $delete_query = mysqli_query($conn, "DELETE FROM shopping_cart WHERE cart_id = $cart_data[cart_id]");
                    if($delete_query) {
                        echo " Item deleted successfully";
                        continue; 
                    } else {
                        echo "Error in Deleting/Removing product";
                    }
                } else {
                    $update_query = mysqli_query($conn, "UPDATE `shopping_cart` SET `quantity` = $product_quantity WHERE `product_id` = '$product_id' AND `user_id` = '$user_id'");
                    if(!$update_query) {
                       echo "Error in Updating product";
                    }
                }
            }
        }
        
        header("Location:shoping-cart.php");
    }

    // Handle currency converter form submission
    if (isset($_POST['convert_currency'])) {
        $amount = $_POST['amount'];
        $to_currency = $_POST['to_currency'];
        $from_currency = 'INR'; 

        // Your API Key
        $api_key = '5f5bd562a4964194d5f2488b';
        $api_url = "https://v6.exchangerate-api.com/v6/$api_key/latest/$from_currency";

        // Fetch exchange rate data
        $response = file_get_contents($api_url);
        $data = json_decode($response, true);

        // Check if the API request was successful
        if ($data['result'] == 'success') {
            $rate = $data['conversion_rates'][$to_currency];
            $converted_amount = $amount * $rate;

            // Output the result
            $conversion_result = "<h2>Conversion Result</h2>
                                  <p>$amount $from_currency is equal to $converted_amount $to_currency.</p>";
        } else {
            $conversion_result = "<h2>Error</h2>
                                  <p>There was an error fetching the exchange rate.</p>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shopping Cart</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Include jQuery library --> 
    <?php include("main_files/main_header.php");?>
</head>
<body class="animsition">
    <!-- Header -->
    <header class="header-v4">
        <?php include("main_files/top_bar.php"); ?>
    </header>
    
    <!-- Cart -->
    <?php if(isset($user_id) && isset($user_email)): ?>
        <?php include("main_files/cart.php"); ?>
    <?php endif; ?>

    <!-- Breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                Shopping Cart
            </span>
        </div>
    </div>

    <!-- Shopping Cart Form -->
    <form action="#" method="POST" class="bg0 p-t-75 p-b-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart">
                                <tr class="table_head">
                                    <th class="column-1">Product</th>
                                    <th class="column-2">Product_Title</th>
                                    <th class="column-3">Price</th>
                                    <th class="column-4">Quantity</th>
                                    <th class="column-5">Total</th>
                                </tr>
                                <!-- Inside the table -->
                                <?php 
                                    $cart_query = mysqli_query($conn, "SELECT * FROM `shopping_cart` WHERE  `user_id` = '$user_id'");
                                    $subtotal = 0;
                                    while ($cart_data = mysqli_fetch_array($cart_query)) { 
                                        $product_query = mysqli_query($conn, "SELECT * FROM product WHERE product_id = '{$cart_data['product_id']}'");
                                        $product_row = mysqli_fetch_array($product_query);
                                ?>
                                <tr class="table_row" data-id="<?php echo $cart_data['cart_id']; ?>">
                                    <td class="column-1">
                                        <div class="how-itemcart1">
                                            <img src="<?php echo '../Admin/uploads/'.$product_row['product_thumb']; ?>" alt="Product Thumbnail">
                                            <input type="hidden" class="cart_id" value="<?php echo $cart_data['cart_id']; ?>">
                                        </div>
                                    </td>
                                    <td class="column-2"><?php echo $product_row['product_title']; ?></td>
                                    <td class="column-3"><?php echo $product_row['product_price']; ?></td>
                                    <td class="column-4">
                                        <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>
                                            <input class="mtext-104 cl3 txt-center num-product increse_product" type="number" name="quantity_<?php echo $product_row['product_id']; ?>" data-product-id="<?php echo $product_row['product_id']; ?>" value="<?php echo $cart_data['quantity']; ?>">
                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus increse_product"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="column-5"><?php
                                        $product_price =  $product_row['product_price'];
                                        $quantity =  $cart_data['quantity'];
                                        $total = $product_price * $quantity;
                                        echo $total;
                                    ?></td>
                                </tr>
                                <?php
                                    $subtotal += $total;
                                } ?>
                            </table>
                        </div>

                        <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                            <div class="flex-w flex-m m-r-20 m-tb-5">
                                <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">
                                    
                                <a class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5" href="placeorder.php">
                                    Checkout
                                </a>
                            </div>

                            <button type="submit" name="update_cart" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10 update_cart">
                                Update Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Currency Converter Form -->
                <div class="col-lg-10 col-xl-5 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            <form action="" method="post">
                                <input type="hidden" id="amount" name="amount" step="0.01" value="<?php echo $subtotal; ?>" required>

                                <label for="to_currency">Convert to:</label>
                                <select id="to_currency" name="to_currency" required>
                                    <option value="USD">USD - United States Dollar</option>
                                    <option value="EUR">EUR - Euro</option>
                                    <option value="GBP">GBP - British Pound</option>
                                    <option value="JPY">JPY - Japanese Yen</option>
                                    <option value="AUD">AUD - Australian Dollar</option>
                                    <option value="CAD">CAD - Canadian Dollar</option>
                                    <option value="CHF">CHF - Swiss Franc</option>
                                    <option value="CNY">CNY - Chinese Yuan</option>
                                    <option value="SEK">SEK - Swedish Krona</option>
                                    <option value="NZD">NZD - New Zealand Dollar</option>
                                </select>

                                <button type="submit" name="convert_currency">Convert</button>
                            </form>

                            <?php
                            if (isset($conversion_result)) {
                                echo $conversion_result;
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>

    <!-- Footer -->
    <?php include("main_files/footer.php"); ?>

    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <?php include("main_files/main_scripts.php"); ?>
    <script>
        $(document).ready(function(){
            $(".how-itemcart1").click(function(){
                var cartid = $(this).find(".cart_id").val();        

                $.ajax({
                    url: 'delete_product.php',
                    type: 'POST',
                    data: { cart_id: cartid },
                    success: function(response){
                        $(".table_row[data-id='" + cartid + "']").hide();
                        location.reload();
                    }
                });
            });
        });
    </script>
</body>
</html>
