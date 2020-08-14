<?php
include('logincheck.php');
if(!isset($_SESSION['user'])){
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete-Product</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <?php include 'links.php'?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php
        $ambil = $con->query("SELECT * FROM product WHERE id='$_GET[id]'");
        $pecah = $ambil->fetch_assoc();

        if(isset($_POST['del'])){
            $img1 = $pecah['image_1'];
            $img2 = $pecah['image_2'];
            $img3 = $pecah['image_3'];

            if(file_exists("product_image/$img1")){
                unlink("product_image/$img1");
            }if(file_exists("product_image/$img2")){
                unlink("product_image/$img2");
            }if(file_exists("product_image/$img3")){
                unlink("product_image/$img3");
            }

            $con->query("DELETE FROM product WHERE id='$_GET[id]'");

            echo "
            <script>
            alert('data berhasil dihapus!');
            document.location.href = 'product.php';
            </script>
            ";
        }
    ?>
    <div class="form center-div">
        <h2>Delete Design <?= $pecah['product_code']; ?> ?</h2>
        <form action="" method="post">
            <input type="submit" value="Yes" name="del" class="btn btn-danger">
            <a href="product.php" class="btn btn-dark">No</a>
        </form>
    </div>
</body>
</html>