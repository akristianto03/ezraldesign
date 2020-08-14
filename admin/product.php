<?php
include('logincheck.php');
if(!isset($_SESSION['user'])){
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Product</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <?php include 'links.php'?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>

        <div class="container center-div shadow">
            <div class="heading text-center text-uppercase text-black mb-5">
                Data Produk
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr class="firstrow">
                        <th>No</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Desc</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $num = 1; ?>
                    <?php $ambil = $con->query('SELECT * FROM product'); ?>
                    <?php while($pecah = $ambil->fetch_assoc()){ ?>
                    <tr>
                        <td><?= $num ?></td>
                        <td><?= $pecah['product_code']; ?></td>
                        <td><?= $pecah['product_name']; ?></td>
                        <td><?= $pecah['price']; ?></td>
                        <td><img src="product_image/<?= $pecah['image_1']; ?>" width="100"></td>
                        <td><?= $pecah['product_desc']; ?></td>
                        <td>(<?= $pecah['tampil']; ?>)</td>
                        <td>
                            <a href="delete.php?id=<?= $pecah['id']; ?>" class="btn-danger btn">delete</a>
                            <a href="edit.php?id=<?= $pecah['id']; ?>" class="btn btn-warning">update</a>
                        </td>
                    </tr>
                    <?php $num++; } ?>
                </tbody>
            </table>
            
            <a href="addproduct.php" class="btn btn-primary mb-2">Add Product</a> <br>
            <a href="adminmainpage.php" class="btn btn-success mb-5">Kembali</a>
        </div>

    </body>
</html>