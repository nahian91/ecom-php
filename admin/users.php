<?php include 'inc/header.php';?>
    <div class="col-xxl-9">
        <a href="" class="btn btn-primary">Add User</a>
        <br>
        <br>
        <?php
            if(isset($_SESSION['user_add'])) {
                echo $_SESSION['user_add'];
                unset ($_SESSION['user_add']);
            }
            if(isset($_SESSION['user_delete'])) {
                echo $_SESSION['user_delete'];
                unset ($_SESSION['user_delete']);
            }
            if(isset($_SESSION['user_update'])) {
                echo $_SESSION['user_update'];
                unset ($_SESSION['user_update']);
            }
        ?>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>SL.</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                <tbody>
                    <?php
                        $users = "SELECT * FROM admin";
                        $users_query = mysqli_query($con, $users);

                        if($users_query) {
                            $count = mysqli_num_rows($users_query);
                                if($count > 0) {
                                    $i = 0;
                                    while($row = mysqli_fetch_assoc($users_query)) {
                                    $i++;
                                        ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $row['admin_fullname'];?></td>
                                            <td><?php echo $row['admin_username'];?></td>
                                            <td><?php echo $row['admin_email'];?></td>
                                            <td>
                                                <img src="img/users/<?php echo $row['admin_image'];?>" alt="" style="width:120px">
                                            </td>
                                            <td><?php if($row['admin_role'] == 0) {echo 'Moderator';} else {echo 'Admin';} ?></td>
                                            <td>
                                                <a href="edit-users.php?id=<?php echo $row['admin_id'];?>" class="btn btn-info">Edit</a>
                                                <a href="delete-users.php?id=<?php echo $row['admin_id'];?>&admin_image=<?php echo $row['admin_image'];?>" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php
                                }  
                            }  else {
                                echo '<div class="alert alert-primary" role="alert">
                                No Users Found!
                              </div>
                              ';
                            }                            
                        }
                    ?>
                </tbody>
            </thead>
        </table>
    </div>
<?php include 'inc/footer.php';?>