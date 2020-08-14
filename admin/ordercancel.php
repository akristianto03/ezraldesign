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


            //show again at catalog

            mysqli_query($con,"UPDATE product SET
            tampil = ''
            WHERE product_code = '$code'
            ");

            echo "
            <script>
            alert('Transaksi ".$pecah['product_code']." Dibatalkan !');
            document.location.href = 'order.php';
            </script>
            ";
        }
    ?>
    <div class="form center-div">
        <h2>Cancel Transaction Design <?= $pecah['product_code']; ?> ?</h2>
        <form action="" method="post">
            <input type="submit" value="Yes" name="del" class="btn btn-danger">
            <a href="order.php" class="btn btn-dark">No</a>
        </form>
    </div>
</body>
</html>