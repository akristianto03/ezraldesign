<?php
include('logincheck.php');
if(!isset($_SESSION['user'])){
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Order</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <?php include 'links.php'?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>

        <div class="container center-div shadow">
            <div class="heading text-center text-uppercase text-black mb-5">
                Data Pemesanan
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Code</th>
                        <th>Price</th>
                        <th>Buyer_name</th>
                        <th>Email</th>
                        <th>Instruction</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $num = 1; ?>
                    <?php $ambil = $con->query('SELECT * FROM order_product JOIN product ON order_product.product_code=product.product_code'); ?>
                    <?php while($pecah = $ambil->fetch_assoc()){ ?>
                    <tr>
                        <td><?= $num ?></td>
                        <td><?= $pecah['product_code']; ?></td>
                        <td><?= $pecah['price']; ?></td>
                        <td><?= $pecah['buyer_name']; ?></td>
                        <td><?= $pecah['buyer_email']; ?></td>
                        <td><?= $pecah['design_instruct']; ?></td>
                        <td>
                            <a href="orderdel.php?id_buyer=<?= $pecah['id_buyer']; ?>" class="btn-success btn">Done</a>
                            <a href="ordercancel.php?id_buyer=<?= $pecah['id_buyer']; ?>" class="btn-danger btn">Cancel</a>
                        </td>
                    </tr>
                    <?php $num++; } ?>
                </tbody>
            </table>

            <a href="adminmainpage.php" class="btn btn-success mb-5">Kembali</a>
        </div>

    </body>
</html>