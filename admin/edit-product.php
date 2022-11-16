<?php include 'inc/header.php';?>
            <div class="col-xxl-9">

                <?php
                    $product_id = $_GET['id'];
                    
                    $product_info = "SELECT * FROM product WHERE product_id = $product_id";
                    $product_query = mysqli_query($con, $product_info);
                    $res = mysqli_fetch_assoc($product_query);
                ?>

                <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="product_update_id" value="<?php echo $product_id;?>">
<input type="hidden" name="current_image" value="<?php echo $res['product_img']; ?>">
                    <div class="mb-3">
                      <label>Title</label>
                      <input type="text" class="form-control" name="title" value="<?php echo $res['product_title'];?>">
                    </div>
                    <div class="mb-3">
                      <label>Description</label>
                      <textarea name="description" class="form-control"><?php echo $res['product_desc'];?></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="image">
                        <?php if($res['product_img'] != '') {
                        ?>
                            <img src="../assets/img/products/<?php echo $res['product_img']; ?>" width="150px">
                        <?php } ?>
                    </div>
                    <div class="mb-3">
                        <label>Price</label>
                        <input type="number" class="form-control" name="price" value="<?php echo $res['product_price']; ?>">
                    </div>
                    <!-- <div class="mb-3">
                        <label>Category</label>
                        <select name="product" class="form-control">
                            <option selected disabled>Select Category</option>
                           
                        </select>
                    </div> -->
                    <div class="mb-3">
                        <label>Color</label>
                        <input type="text" class="form-control" name="color" value="<?php echo $res['product_color'];?>">
                    </div>
                    <div class="mb-3">
                        <label>Size</label>
                        <input type="text" name="size" class="form-control" value="<?php echo $res['product_size'];?>">
                    </div>
                    <div class="mb-3">
                        <label>Stock</label>
                        <input type="text" name="stock" class="form-control" value="<?php echo $res['product_stock'];?>">
                    </div>
                    <div class="mb-3">
                      <label>Featured?</label>
                      <input type="radio" name="featured" value="Yes" <?php if($res['product_featured']=="Yes"){echo "checked";} ?>>Yes
                <input type="radio" name="featured" value="No" <?php if($res['product_featured']=="No"){echo "checked";} ?>>No
                      
                    </div>
                    <div class="mb-3">
                        <label>Active?</label>
                        <input type="radio" name="active" value="Yes" <?php if($res['product_active']=="Yes"){echo "checked";} ?>>Yes
                <input type="radio" name="active" value="No" <?php if($res['product_active']=="No"){echo "checked";} ?>>No
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit"> Update Product</button>
                </form>

                <?php
            if(isset($_POST['submit'])) {
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                //$product = $_POST['product'];
                $color = $_POST['color'];
                $size = $_POST['size'];
                $stock = $_POST['stock'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];
                $old_image = $_FILES['image']['name'];
                $current_image = $_POST['current_image'];
                $update_id = $_POST['product_update_id'];

                if(isset($old_image))
                {
                    
                    if($old_image != "")
                    {
                        $image_ext = explode('.', $old_image);
                        $image_exp = end($image_ext);
                        $image_name = 'product-'.rand(). '.' . $image_exp;
                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path = "../assets/img/products/".$image_name;
                        $upload = move_uploaded_file($source_path, $destination_path);

                        //B. Remove the Current Image if available
                        if($current_image!="")
                        {
                            $remove_path = "../assets/img/products/".$current_image;
                            $remove = unlink($remove_path);
                        }  
                    }
                    else
                    {
                        $image_name = $current_image;
                    }
                }
                else
                {
                    $image_name = $current_image;
                }
                $update = "UPDATE product SET product_title = '$title', product_desc = '$description', product_img = '$image_name', product_price = '$price', product_cat = 'Test', product_color = '$color', product_size = '$size', product_stock = '$stock', product_featured = '$featured', product_active = '$active'  WHERE product_id = '$update_id'";
                $update_query = mysqli_query($con, $update);
                if($update_query) {
                    $_SESSION['product_update'] = 'Successfully Updated New Product';
                    header('location: products.php');           
                }
            }
        ?>

            </div>
<?php include 'inc/footer.php';?>