<?php
    session_start();
    if(isset($_SESSION['username'])) {
        header('location:login.php');
    }
    include '../assets/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-xxl-7 mx-auto">
                <h4 class="text-center">Login</h4>
                <hr>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                    <div class="mb-3">
                      <label>Username</label>
                      <input type="text" class="form-control" name="username">
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary" name="login">Login</button>
                </form>

                <?php
                    if(isset($_POST['login'])) {
                        $username = $_POST['username'];
                        $password = $_POST['password'];

                        $select = "SELECT * FROM admin WHERE admin_username = '$username' AND admin_password = '$password'";
                        $select_query = mysqli_query($con, $select);

                        $select_query_count = mysqli_num_rows($select_query);

                        if($select_query_count == 1) {
                            $_SESSION['username'] = $username;
                            header('location:index.php');
                        } else {
                            echo 'Not Match';
                        }
                    } 
                ?>

            </div>
        </div>
    </div>
</body>
</html>