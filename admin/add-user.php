<?php include 'inc/header.php';?>
    <div class="col-xxl-9">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label>Full Name</label>
                <input type="text" class="form-control" name="fullname">
            </div>
            <div class="mb-3">
                <label>Username</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="mb-3">
                <label>Confirm Password</label>
                <input type="password" class="form-control" name="cpassword">
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="image">
            </div>
            <div class="mb-3">
                <label>Role</label>
                <select name="role" class="form-control">
                    <option selected disabled>Select Role</option>
                    <option value="0">Moderator</option>
                    <option value="1">Admin</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Add User</button>
        </form>

        <?php
            if(isset($_POST['submit'])) {
                $fullname = $_POST['fullname'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $cpassword = $_POST['cpassword'];
                $email = $_POST['email'];
                $role = $_POST['role'];

                if(isset($_FILES['image']['name'])) {
                    $image = $_FILES['image']['name'];
                    $image_ext = explode('.', $image);
                    $image_exp = end($image_ext);
                    $image_name = $username . '.' . $image_exp;
                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = "img/users/".$image_name;
                    $upload = move_uploaded_file($source_path, $destination_path);
                }

                $user_insert = "INSERT INTO admin (admin_fullname, admin_username, admin_password, admin_email, admin_image, admin_role) VALUES ('$fullname', '$username', '$password', '$email', '$image_name', '$role')";
                $user_query = mysqli_query($con, $user_insert);
                if($user_query) {
                    $_SESSION['user_add'] = 'Successfully Insert New User';
                    header('location: users.php');               
                }
            }
        ?>

    </div>
<?php include 'inc/footer.php';?>