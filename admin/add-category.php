<?php include 'inc/header.php';?>
            <div class="col-xxl-9">
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label>Title</label>
                      <input type="text" class="form-control" name="title">
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
                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Add Category</button>
                </form>

                <?php
                    if(isset($_POST['submit'])) {
                        $title = $_POST['title'];

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
                            $image_name = 'category-'. rand() . '.' . $image_exp;
                            $source_path = $_FILES['image']['tmp_name'];
                            $destination_path = "img/categorys/".$image_name;
                            $upload = move_uploaded_file($source_path, $destination_path);
                        }

                        $category_insert = "INSERT INTO category (cat_title, cat_featured, cat_active, cat_image) VALUES ('$title', '$featured', '$active', '$image_name')";
                        $category_query = mysqli_query($con, $category_insert);
                        if($category_query) {
                            $_SESSION['category_add'] = 'Successfully Insert New Category';
                            header('location: categorys.php');               
                        }
                    }
                ?>

            </div>
        </div>
    </div>
</body>
</html>