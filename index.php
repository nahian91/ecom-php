<?php
    include 'assets/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header class="header-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-3">
                    <div class="logo">
                        <a href="">Ecom</a>
                    </div>
                </div>
                <div class="col-xxl-6 text-center">
                    <div class="menu">
                        <ul>
                            <li><a href="">Home</a></li>
                            <li><a href="">Products</a></li>
                            <li><a href="">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xxl-3 text-end">
                    <a href="" class="btn btn-outline-primary">$45</a>
                    <a href="" class="btn btn-outline-primary ms-2">Login</a>
                </div>
            </div>
        </div>
    </header>

    <section class="bannar" style="background-image: url('assets/img/bannar.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <h1>Raining Offers For <br> Hot Summer!</h1>
                    <a href="" class="btn btn-primary">Shop Now</a>
                </div>
            </div>
        </div>
    </section>

    <section class="page-area">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="section-title">
                        <h4>featured category</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                    $cats = mysqli_query($con, "SELECT * FROM category WHERE cat_featured = 'Yes' AND cat_active = 'Yes' LIMIT 3");
                    while($cat = mysqli_fetch_assoc($cats)){
                        ?>
                            <div class="col-xxl-4">
                                <div class="single-cat" style="background-image: url('assets/img/categorys/<?php echo $cat['cat_image']; ?>');">
                                    <h4><?php echo $cat['cat_title']; ?></h4>
                                    <a href="">Shop Now</a>
                                </div>
                            </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </section>

    <section class="product-area">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="section-title">
                        <h4>featured products</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                    $products = mysqli_query($con, "SELECT * FROM product WHERE product_featured = 'Yes' AND product_active = 'Yes' LIMIT 8");
                    while($product = mysqli_fetch_assoc($products)){
                        ?>
                        <div class="col-xxl-3">
                            <div class="single-product">
                                <img class="img-fluid" src="assets/img/products/<?php echo $product['product_img'];?>" alt="">
                                <h4><a href=""><?php echo $product['product_title'];?></a></h4>
                                <h5><a href=""><?php echo $product['product_cat'];?></a></h5>
                                <span><?php echo $product['product_price'];?></span>
                                <a href="">Add to Cart</a>
                            </div>
                        </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-xxl-12 text-center">
                    <p>&copy; 2022 all rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>