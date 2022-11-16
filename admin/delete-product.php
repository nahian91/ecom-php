<?php
session_start();
include '../assets/config.php';
$product_id = $_GET['id'];
$product_image = $_GET['product_img'];

if($product_img != "")
    {
        $path = "img/products/".$product_img;
        $remove = unlink($path);
}

$product_del = "DELETE FROM product WHERE product_id = $product_id";
$product_del_query = mysqli_query($con, $product_del);

if($product_del_query) {
    $_SESSION['product_delete'] = 'Successfully Delete New Prouct';
    header('location: products.php');
}

