<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Page</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <?php include 'links.php'?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>

        <div class="container center-div shadow">
            <div class="heading text-center text-uppercase text-black mb-5">
                Halaman Admin
            </div>
            <div class="button">
                <a href="product.php" class="btn btn-success mb-5">Tabel Produk</a>
                <a href="order.php" class="btn btn-warning mb-5">Tabel Pemesanan</a>
                <a href="logout.php" class="btn btn-danger mb-5">Logout</a>
            </div>
        </div>

    </body>
</html>