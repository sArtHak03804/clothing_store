<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$allowed_pages = array("index.php", "top_bar.php","product.php", "product-detail.php");

$filename = basename($_SERVER['PHP_SELF']);

if (!in_array($filename, $allowed_pages)) {
    if (!isset($_SESSION['user_id'])) {
        header("Location: user_login.php");
        exit(); 
    }
}

if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) {
    $user_id = $_SESSION['user_id'];
    $user_email = $_SESSION['user_email'];
}
?>
