<?php include 'inc/header.php';?>
            <div class="col-xxl-9">
                <table class="table table-hover table-bordered">
                    <?php
                        $product_id = $_GET['id'];
                        $product = "SELECT * FROM product WHERE product_id = '$product_id'";
                        $product_query = mysqli_query($con, $product);
                        $row = mysqli_fetch_assoc($product_query);
                    ?>
                    <tr>
                        <th>Title</th>
                        <td><?php echo $row['product_title'];?></td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td><?php echo $row['product_desc'];?></td>
                    </tr>
                    <tr>
                        <th>Image</th>
                        <td>
                            <img src="img/products/<?php echo $row['product_img'];?>" alt="" style="width: 120px">
                        </td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td><?php echo $row['product_price'];?></td>
                    </tr>
                    <tr>
                        <th>Category</th>
                        <td><?php echo $row['product_cat'];?></td>
                    </tr>
                    <tr>
                        <th>Color</th>
                        <td><?php echo $row['product_color'];?></td>
                    </tr>
                    <tr>
                        <th>Size</th>
                        <td><?php echo $row['product_size'];?></td>
                    </tr>
                    <tr>
                        <th>Stock</th>
                        <td><?php echo $row['product_stock'];?></td>
                    </tr>
                    <tr>
                        <th>Featured</th>
                        <td><?php echo $row['product_featured'];?></td>
                    </tr>
                    <tr>
                        <th>Active</th>
                        <td><?php echo $row['product_active'];?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>