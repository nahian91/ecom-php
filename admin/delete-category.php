<?php
session_start();
include '../assets/config.php';
$cat_id = $_GET['id'];
$cat_image = $_GET['cat_image'];

if($cat_image != "")
    {
        $path = "img/categorys/".$cat_image;
        $remove = unlink($path);
}

$cat_del = "DELETE FROM category WHERE cat_id = $cat_id";
$cat_del_query = mysqli_query($con, $cat_del);

if($cat_del_query) {
    $_SESSION['cat_delete'] = 'Successfully Delete New Category';
    header('location: categorys.php');
}

