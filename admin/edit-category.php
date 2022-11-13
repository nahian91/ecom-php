<?php include 'inc/header.php';?>
    <div class="col-xxl-9">
        <?php
            $cat_id = $_GET['id'];
            
            $cat_info = "SELECT * FROM category WHERE cat_id = $cat_id";
            $cat_query = mysqli_query($con, $cat_info);
            $res = mysqli_fetch_assoc($cat_query);
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="cat_update_id" value="<?php echo $cat_id;?>">
            <input type="hidden" name="current_image" value="<?php echo $res['cat_image']; ?>">
            <div class="mb-3">
                <label>Title</label>
                <input type="text" class="form-control" name="title" value="<?php echo $res['cat_title'];?>">
            </div>
            <div class="mb-3">
                <label>Featured?</label>
                <input type="radio" name="featured" value="Yes" <?php if($res['cat_featured']=="Yes"){echo "checked";} ?>>Yes
                <input type="radio" name="featured" value="No" <?php if($res['cat_featured']=="No"){echo "checked";} ?>>Yes
            </div>
            <div class="mb-3">
                <label>Active?</label>
                <input type="radio" name="active" value="Yes" <?php if($res['cat_active']=="Yes"){echo "checked";} ?>>Yes
                <input type="radio" name="active" value="No" <?php if($res['cat_active']=="No"){echo "checked";} ?>>Yes
                </div>
            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="image">
                <?php if($res['cat_image'] != '') {
                ?>
                    <img src="img/categorys/<?php echo $res['cat_image']; ?>" width="150px">
                <?php } ?>
            </div>
            <button type="submit" class="btn btn-primary" name="update">Update Category</button>
        </form>
        <?php
            if(isset($_POST['update'])) {
                $title = $_POST['title'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];
                $old_image = $_FILES['image']['name'];
                $current_image = $_POST['current_image'];
                $update_id = $_POST['cat_update_id'];

                if(isset($old_image))
                {
                    
                    if($old_image != "")
                    {
                        $image_ext = explode('.', $old_image);
                        $image_exp = end($image_ext);
                        $image_name = 'category-'.rand(). '.' . $image_exp;
                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path = "img/categorys/".$image_name;
                        $upload = move_uploaded_file($source_path, $destination_path);

                        //B. Remove the Current Image if available
                        if($current_image!="")
                        {
                            $remove_path = "img/categorys/".$current_image;
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

                $update = "UPDATE category SET cat_title = '$title', cat_featured = '$featured', cat_active = '$active', cat_image = '$image_name' WHERE cat_id = '$update_id'";
                $update_query = mysqli_query($con, $update);
                if($update_query) {
                    $_SESSION['cat_update'] = 'Successfully Updated New Category';
                    header('location: categorys.php');           
                }
            }
        ?>
    </div>
<?php include 'inc/footer.php';?>