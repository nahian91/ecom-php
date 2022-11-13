<?php
session_start();
include '../assets/config.php';
$user_id = $_GET['id'];
$admin_image = $_GET['admin_image'];

if($admin_image != "")
    {
        $path = "img/users/".$admin_image;
        $remove = unlink($path);
}

$user_del = "DELETE FROM admin WHERE admin_id = $user_id";
$user_del_query = mysqli_query($con, $user_del);

if($user_del_query) {
    $_SESSION['user_delete'] = 'Successfully Insert New User';
    header('location: users.php');
}

