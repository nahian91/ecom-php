<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header('location:login.php');
    }
    include '../assets/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <section class="header">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6">
                    <div class="logo">
                        <a href="">Add User</a>
                    </div>
                </div>
                <div class="col-xxl-6 text-end">
                    <a href="logout.php"><?php echo $_SESSION['username'];?>, Logout</a>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-xxl-3">
                <h4 class="title">Menu</h4>
                <div class="list-group">
                    <a href="index.php" class="list-group-item list-group-item-action">Dashboard</a>
                    <a href="categorys.php" class="list-group-item list-group-item-action">Category</a>
                    <a href="users.php" class="list-group-item list-group-item-action">Users</a>
                    <a href="products.php" class="list-group-item list-group-item-action">Products</a>
                    <a href="admin.php" class="list-group-item list-group-item-action">Admin</a>
                    <a href="orders.php" class="list-group-item list-group-item-action">Orders</a>  
                    <a href="message.php" class="list-group-item list-group-item-action">Message</a>                    
                    <a href="settings.php" class="list-group-item list-group-item-action">Settings</a>
                    <a href="logout.php" class="list-group-item list-group-item-action">Logout</a>
                </div>
            </div>