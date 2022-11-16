<?php include 'inc/header.php';?>
            <div class="col-xxl-9">
                <div class="row">
                    <div class="col-xxl-3">
                        <div class="singlecount">
                            <?php
                                $users = "SELECT * FROM admin";
                                $users_query = mysqli_query($con, $users);
                                $count = mysqli_num_rows($users_query);
                            ?>
                            <h4>total users <span><?php echo $count;?></span></h4>
                        </div>
                    </div>
                    <div class="col-xxl-3">
                        <div class="singlecount">
                            <?php
                                $cats = "SELECT * FROM category";
                                $cats_query = mysqli_query($con, $cats);
                                $count = mysqli_num_rows($cats_query);
                            ?>
                            <h4>total categorys <span><?php echo $count;?></span></h4>
                        </div>
                    </div>
                    <div class="col-xxl-3">
                        <div class="singlecount">
                            <h4>total products <span>20</span></h4>
                        </div>
                    </div>
                    <div class="col-xxl-3">
                        <div class="singlecount">
                            <h4>total orders <span>20</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>