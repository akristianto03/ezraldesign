<?php
include('logincheck.php');
if(!isset($_SESSION['user'])){
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Complete-Transaction</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <?php include 'links.php'?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php
        $ambil = $con->query("SELECT * FROM order_product WHERE id_buyer='$_GET[id_buyer]' ");
        $pecah = $ambil->fetch_assoc();

        if(isset($_POST['del'])){
            $code = $pecah['product_code'];
            $con->query("DELETE FROM order_product WHERE id_buyer='$_GET[id_buyer]'");


            //del stock

            $ambil2 = $con->query("SELECT * FROM product WHERE product_code='$code' ");
            $pecah2 = $ambil2->fetch_assoc();
            
            $img1 = $pecah2['image_1'];
            $img2 = $pecah2['image_2'];
            $img3 = $pecah2['image_3'];

            if(file_exists("product_image/$img1")){
                unlink("product_image/$img1");
            }if(file_exists("product_image/$img2")){
                unlink("product_image/$img2");
            }if(file_exists("product_image/$img3")){
                unlink("product_image/$img3");
            }

            $con->query("DELETE FROM product WHERE product_code='$code'");

            echo "
            <script>
            alert('Transaksi ".$pecah['product_code']." Selesai !');
            document.location.href = 'order.php';
            </script>
            ";
        }
    ?>
    <div class="form center-div">
        <h2>Done Transaction Design <?= $pecah['product_code']; ?> ?</h2>
        <form action="" method="post">
            <input type="submit" value="Yes" name="del" class="btn btn-success">
            <a href="order.php" class="btn btn-dark">No</a>
        </form>
    </div>
</body>
</html>