<?php include 'inc/header.php';?>
            <div class="col-xxl-9">

                <?php
                    if(isset($_POST['submit'])) {
                        $title = $_POST['title'];
                        $description = $_POST['description'];
                        $price = $_POST['price'];
                        $product = $_POST['product'];
                        $color = $_POST['color'];
                        $size = $_POST['size'];
                        $stock = $_POST['stock'];
                        
                        if(isset($_POST['featured'])) {
                            $featured = $_POST['featured'];
                        } else {
                            $featured = $_POST['No'];
                        }

                        if(isset($_POST['active'])) {
                            $active = $_POST['active'];
                        } else {
                            $active = $_POST['No'];
                        }

                        if(isset($_FILES['image']['name'])) {
                            $image = $_FILES['image']['name'];
                            $image_ext = explode('.', $image);
                            $image_exp = end($image_ext);
                            $image_name = 'product-'. rand() . '.' . $image_exp;
                            $source_path = $_FILES['image']['tmp_name'];
                            $destination_path = "../assets/img/products/".$image_name;
                            $upload = move_uploaded_file($source_path, $destination_path);
                        }

                        $product_insert = "INSERT INTO product (product_title, product_desc,product_img,product_price,product_cat,product_color,product_size,product_stock,product_featured,product_active) VALUES ('$title', '$description', '$image_name', '$price', '$product','$color','$size','$stock','$featured','$active')";
                        $product_query = mysqli_query($con, $product_insert);
                        if($product_query) {
                            $_SESSION['product_add'] = 'Successfully Insert New Product';
                            header('location: products.php');               
                        }
                    }
                ?>

                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label>Title</label>
                      <input type="text" class="form-control" name="title">
                    </div>
                    <div class="mb-3">
                      <label>Description</label>
                      <textarea name="description" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="image">
                    </div>
                    <div class="mb-3">
                        <label>Price</label>
                        <input type="number" class="form-control" name="price">
                    </div>
                    <div class="mb-3">
                        <label>Category</label>
                        <select name="product" class="form-control">
                            <option selected disabled>Select Category</option>
                            <?php
                                $cats = "SELECT * FROM category";
                                $cat_query = mysqli_query($con, $cats);
                                $count = mysqli_num_rows($cat_query);

                                if($count > 0) {
                                    while($row = mysqli_fetch_assoc($cat_query)) {
                                        echo '<option value='.$row['cat_id'].'>'.$row['cat_title'].'</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Color</label>
                        <input type="text" class="form-control" name="color">
                    </div>
                    <div class="mb-3">
                        <label>Size</label>
                        <input type="text" name="size" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Stock</label>
                        <input type="text" name="stock" class="form-control">
                    </div>
                    <div class="mb-3">
                      <label>Featured?</label>
                      <input type="radio" name="featured" value="Yes">Yes
                      <input type="radio" name="featured" value="No">Yes
                    </div>
                    <div class="mb-3">
                        <label>Active?</label>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">Yes
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit"> Add Product</button>
                </form>

            </div>
<?php include 'inc/footer.php';?>