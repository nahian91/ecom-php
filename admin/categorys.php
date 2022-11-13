<?php include 'inc/header.php';?>
            <div class="col-xxl-9">
                <a href="" class="btn btn-primary">Add Category</a>
                <br>
                <br>
                <?php
                    if(isset($_SESSION['category_add'])) {
                        echo $_SESSION['category_add'];
                        unset ($_SESSION['category_add']);
                    }
                    if(isset($_SESSION['category_delete'])) {
                        echo $_SESSION['category_delete'];
                        unset ($_SESSION['category_delete']);
                    }
                    if(isset($_SESSION['cat_update'])) {
                        echo $_SESSION['cat_update'];
                        unset ($_SESSION['cat_update']);
                    }
                ?>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Title</th>
                            <th>Featured?</th>
                            <th>Active?</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        <tbody>
                            <?php
                                $cats = "SELECT * FROM category";
                                $cats_query = mysqli_query($con, $cats);
                                $i = 1;
                                while($row = mysqli_fetch_assoc($cats_query)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo $row['cat_title'];?></td>
                                        <td><?php echo $row['cat_featured'];?></td>
                                        <td><?php echo $row['cat_active'];?></td>
                                        <td>
                                            <img src="img/categorys/<?php echo $row['cat_image'];?>" alt="" style="width: 120px">
                                        </td>
                                        <td>
                                            <a href="edit-category.php?id=<?php echo $row['cat_id'];?>" class="btn btn-info">Edit</a>
                                            <a href="delete-category.php?id=<?php echo $row['cat_id'];?>&cat_image=<?php echo $row['cat_image'];?>" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                print_r($row);
                            ?>
                        </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</body>
</html>