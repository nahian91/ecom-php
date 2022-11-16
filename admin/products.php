<?php include 'inc/header.php';?>
            <div class="col-xxl-9">
                <a href="" class="btn btn-primary">Add Category</a>
                <br>
                <br>
                <?php
                    if(isset($_SESSION['product_add'])) {
                        echo $_SESSION['product_add'];
                        unset ($_SESSION['product_add']);
                    }
                    if(isset($_SESSION['product_delete'])) {
                        echo $_SESSION['product_delete'];
                        unset ($_SESSION['product_delete']);
                    }
                    if(isset($_SESSION['product_update'])) {
                        echo $_SESSION['product_update'];
                        unset ($_SESSION['product_update']);
                    }
                ?>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr> 	
                            <th>SL.</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Featured?</th>
                            <th>Active?</th>
                            <th>Action</th>
                        </tr>
                        <tbody>
                            <?php
                                $product = "SELECT * FROM product";
                                $product_query = mysqli_query($con, $product);
                                $i = 1;
                                while($row = mysqli_fetch_assoc($product_query)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo $row['product_title'];?></td>
                                        <td><img src="../assets/img/products/<?php echo $row['product_img'];?>" alt="" style="width: 120px"></td>
                                        <td><?php echo $row['product_price'];?></td>
                                        <td><?php echo $row['product_cat'];?></td>
                                        <td><?php echo $row['product_featured'];?></td>
                                        <td><?php echo $row['product_active'];?></td>
                                        <td>
                                            <a href="view-product.php?id=<?php echo $row['product_id'];?>" class="btn btn-primary">View</a>
                                            <a href="edit-product.php?id=<?php echo $row['product_id'];?>" class="btn btn-info">Edit</a>
                                            <a href="delete-product.php?id=<?php echo $row['product_id'];?>&product_image=<?php echo $row['product_img'];?> " class="btn btn-danger" onclick="return confirm ('Are You Sure?')">Delete</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</body>
</html>