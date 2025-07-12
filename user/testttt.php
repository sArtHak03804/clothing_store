<?php
$conn = mysqli_connect("localhost", "root", "", "clothing_db");

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    $product_query = mysqli_query($conn, "SELECT * FROM product WHERE product_id='$product_id'");
    $product_row = mysqli_fetch_array($product_query);

    $modalContent = '<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
        <div class="overlay-modal1 js-hide-modal1"></div>

        <div class="container">
            <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
                <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                    <img src="images/icons/icon-close.png" alt="CLOSE">
                </button>

                <div class="row">
                    <div class="col-md-6 col-lg-7 p-b-30">
                        <div class="p-l-25 p-r-30 p-lr-0-lg">
                            <div class="wrap-slick3 flex-sb flex-w">
                                <div class="wrap-slick3-dots"></div>
                                <div class="wrap-slick3-arrows flex-sb-m flex-w">
                                </div>

                                <div class="slick3 gallery-lb">';

    $explode_images = explode(',', $product_row['product_images']);
    foreach ($explode_images as $image) {
        $modalContent .= '<div class="item-slick3" data-thumb="../Admin/uploads/' . $image . '">
        <div class="wrap-pic-w pos-relative">
            <img src="../Admin/uploads/' . $image . '" alt="IMG-PRODUCT">
            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-01.jpg">
                <i class="fa fa-expand"></i>
            </a>
        </div>
    </div>';
    
    }

    $modalContent .= '</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-5 p-b-30">
                        <div class="p-r-50 p-t-5 p-lr-0-lg">
                            <h4 class="mtext-105 cl2 js-name-detail p-b-14">' . $product_row['product_title'] . '</h4>
                            <span class="mtext-106 cl2">' . $product_row['product_price'] . '</span>
                            <p class="stext-102 cl3 p-t-23">' . $product_row['product_description'] . '</p>

                            <!-- Add your other modal content here -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>';

    echo $modalContent;
} else {
    echo "Product ID is not set!";
}
?>
