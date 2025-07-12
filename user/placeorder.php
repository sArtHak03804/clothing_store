<?php
ob_start(); 
include("main_files/session.php");
include("main_files/connection.php");
include("main_files/main_header.php");

$query = mysqli_query($conn, "select * from clothing_user where user_id=$user_id;");
$user_data = mysqli_fetch_array($query);

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $address = $_POST['user_billing_address'];
    $contact_no = $_POST['contact_no'];
    $shipping_address = $_POST['user_shipping_address'];
    $billing_address = $_POST['user_billing_address'];
    $city = $_POST['billing_city'];
    $state = $_POST['billing_state'];

    $updateqry = mysqli_query($conn, "UPDATE clothing_user SET username='$username',user_email='$user_email',user_billing_address='$billing_address',user_shipping_address='$shipping_address',city='$city',user_state='$state',contact_no=$contact_no WHERE user_id='$user_id'");
    if ($updateqry) {
        $cart_query = mysqli_query($conn, "SELECT * FROM shopping_cart WHERE user_id=$user_id ");
        $plus_query = mysqli_query($conn, "SELECT * from placeorder order by id DESC LIMIT 1"); 
        $row2 = mysqli_fetch_array($plus_query);
        $order_id = $row2['order_id'];
        $new_orderid = $order_id + 1;

        while ($order_data = mysqli_fetch_array($cart_query)) {
            $placeorder = mysqli_query($conn, "INSERT INTO placeorder( order_id, product_id, user_id, quantity, product_price) VALUES($new_orderid, $order_data[product_id],  $order_data[user_id],$order_data[quantity],$order_data[product_price]) ");
            if ($placeorder) {
                $delete_query = mysqli_query($conn, "DELETE FROM shopping_cart WHERE user_id=$user_id");
            } else {
                echo "hiiii";
            }
        }
        $order_id=$new_orderid;
        include("Admin_mail.php");
        include("User_mail.php");
       
       $status_query=mysqli_query($conn,"update placeorder set status=0 where order_id=$order_id");
        
    } else {
        echo "Failed";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Place Order</title>
   
    <!-- <link rel="stylesheet" href="./placeorder.css" /> -->
</head>

<body class="animsition">
    <!-- Header -->
    <header class="header-v4">
        <?php include("main_files/top_bar.php"); ?>
    </header>

    <!-- Cart -->
    <?php include("main_files/cart.php"); ?>

    <!-- breadcrumb -->

    <div class="container">
        <div class="title mt-3">
            <h2>Place Order</h2>
        </div>
        <div class="col-lg">
            <form action="" method="post">
                <!-- Shipping Address -->
                <div class="form-group">
                    <label for="user-name">Name <span class="required">*</span></label>
                    <input type="text" id="user-name" name="username" value="<?php echo $user_data['username'] ?>" required />
                </div>
                <div class="form-group">
                    <label for="phone-number">Phone <span class="required">*</span></label>
                    <input type="tel" id="phone-number" name="contact_no" value="<?php echo $user_data['contact_no'] ?>" required />
                </div>
                <div class="form-group">
                    <label for="email-address">Email Address <span class="required">*</span></label>
                    <input type="email" id="email-address" name="user_email" value="<?php echo $user_data['user_email'] ?>" required />
                </div>
                <div class="form-group">
                    <label for="street-address">Billing Address <span class="required">*</span></label>
                    <textarea name="user_billing_address" id="billing-address" cols="30" rows="5"><?php echo $user_data['user_billing_address'] ?></textarea>
                </div>

                <!-- Billing Address -->
                <div class="billing-address">
                    <h2 class="text-center">Shipping Address</h2>
                    <div class="form-group">
                        <label class="same_content"><input type="checkbox" id="same-address"></label><label for="street-address">Same as Billing-address</label>
                    </div>

                    <div class="form-group">
                        <label for="billing-address">Shipping Address <span class="required">*</span></label>
                        <textarea name="user_shipping_address" id="shipping-address" cols="30" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="billing-city">City <span class="required">*</span></label>
                        <input type="text" id="billing-city" name="billing_city" required>
                    </div>
                    <div class="form-group">
                        <label for="billing-state">State <span class="required">*</span></label>
                        <input type="text" id="billing-state" name="billing_state" required>
                    </div>
                </div>

                <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer mb-3" name="submit" href="" id="place-order-btn" >Place Order</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <?php include("main_files/footer.php"); ?>

    <!-- Back to top -->


    <?php include("main_files/main_scripts.php"); ?>
    <script>
        $(document).ready(function() {
            $('#same-address').click(function() {
                if ($(this).is(':checked')) {
                    $('#billing-city').val($('#shipping-city').val());
                    $('#billing-state').val($('#shipping-state').val());
                    $('#shipping-address').val($('#billing-address').val());
                } else {
                    $('#billing-city').val('');
                    $('#billing-state').val('');
                    $('#shipping-address').val('');
                }
            });

        });
    </script>

</body>
</html>
<?php ob_end_flush(); // Flush the output buffer and send the output to the browser
?>