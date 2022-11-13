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
    <section class="header">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6">
                    <div class="logo">
                        <a href="">Add Product</a>
                    </div>
                </div>
                <div class="col-xxl-6 text-end">
                    <a href="">John Doe, Logout</a>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-xxl-3">
                <h4 class="title">Menu</h4>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action">Dashboard</a>
                    <a href="#" class="list-group-item list-group-item-action">Category</a>
                    <a href="#" class="list-group-item list-group-item-action">Users</a>
                    <a href="" class="list-group-item list-group-item-action">Products</a>
                    <a href="" class="list-group-item list-group-item-action">Logout</a>
                </div>
            </div>
            <div class="col-xxl-9">
                <form action="" method="POST">
                    <div class="mb-3">
                      <label>Title</label>
                      <input type="text" class="form-control" name="title">
                    </div>
                    <div class="mb-3">
                      <label>Description</label>
                      <textarea name="description" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="image">
                    </div>
                    <div class="mb-3">
                        <label>Price</label>
                        <input type="number" class="form-control" name="price">
                    </div>
                    <div class="mb-3">
                        <label>Category</label>
                        <select name="role" class="form-control">
                            <option selected disabled>Select Category</option>
                            <option value="0">Moderator</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Color</label>
                        <input type="text" class="form-control" name="color">
                    </div>
                    <div class="mb-3">
                        <label>Size</label>
                        <input type="text" name="size" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Stock</label>
                        <input type="text" name="stock" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Add User</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>