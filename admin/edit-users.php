<?php include 'inc/header.php';?>
    <div class="col-xxl-9">
        <?php
            $user_id = $_GET['id'];
            
            $user_info = "SELECT * FROM admin WHERE admin_id = $user_id";
            $user_query = mysqli_query($con, $user_info);
            $res = mysqli_fetch_assoc($user_query);
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="user_update_id" value="<?php echo $user_id;?>">
            <input type="hidden" name="current_image" value="<?php echo $res['admin_image']; ?>">
            <div class="mb-3">
                <label>Full Name</label>
                <input type="text" class="form-control" name="fullname" value="<?php echo $res['admin_fullname']?>">
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" class="form-control" name="password" value="<?php echo $res['admin_password']?>">
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $res['admin_email']?>">
            </div>
            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="image">
                <?php if($res['admin_image'] != '') {
                ?>
                    <img src="img/users/<?php echo $res['admin_image']; ?>" width="150px">
                <?php } ?>
            </div>
            <div class="mb-3">
                <label>Role</label>
                <select name="role" class="form-control">
                    <option selected disabled>Select Role</option>
                    <option value="0" <?php if($res['admin_role'] == 0) {echo 'selected';} ?>>Moderator</option>
                    <option value="1" <?php if($res['admin_role'] == 1) {echo 'selected';} ?>>Admin</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="update">Update User</button>
        </form>
        <?php
            if(isset($_POST['update'])) {
                $fullname = $_POST['fullname'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $role = $_POST['role'];
                $old_image = $_FILES['image']['name'];
                $current_image = $_POST['current_image'];
                $update_id = $_POST['user_update_id'];

                if(isset($old_image))
                {
                    
                    if($old_image != "")
                    {
                        $image_ext = explode('.', $old_image);
                        $image_exp = end($image_ext);
                        $image_name = 'user-'.rand(). '.' . $image_exp;
                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path = "img/users/".$image_name;
                        $upload = move_uploaded_file($source_path, $destination_path);

                        //B. Remove the Current Image if available
                        if($current_image!="")
                        {
                            $remove_path = "img/users/".$current_image;
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

                $update = "UPDATE admin SET admin_fullname = '$fullname', admin_password = '$password', admin_email = '$email', admin_image = '$image_name', admin_role = '$role' WHERE admin_id = '$update_id'";
                $update_query = mysqli_query($con, $update);
                if($update_query) {
                    $_SESSION['user_update'] = 'Successfully Updated New User';
                    header('location: users.php');           
                }
            }
        ?>
    </div>
<?php include 'inc/footer.php';?>