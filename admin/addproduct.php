<?php
include('logincheck.php');
if(!isset($_SESSION['user'])){
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add-Product</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <?php include 'links.php'?>
</head>
<body>
    <div class="form center-div">
        <h2>Add Product</h2>
        <form action="" class="form-group" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label>Code</label>
                <input type="text" class="form-control" name="code">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" class="form-control" name="price">
            </div>
            <div class="form-group">
                <label>Images</label>
                <input type="file" class="form-control" name="image_1">
                <input type="file" class="form-control" name="image_2">
                <input type="file" class="form-control" name="image_3">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="desc" class="form-control" rows="10"></textarea>
            </div>
            <input type="submit" class="btn btn-success" name="save" value="Save">
        </form>
    </div>
    <?php
        if(isset($_POST['save'])){
            $code = htmlspecialchars($_POST['code']);
            $nama = htmlspecialchars($_POST['name']);
            $price = htmlspecialchars($_POST['price']);
            $desc = htmlspecialchars($_POST['desc']);

            $name1 = $_FILES['image_1']['name'];
            $loc1 = $_FILES['image_1']['tmp_name'];
            move_uploaded_file($loc1, "product_image/".$name1);

            $name2 = $_FILES['image_2']['name'];
            $loc2 = $_FILES['image_2']['tmp_name'];
            move_uploaded_file($loc2, "product_image/".$name2);

            $name3 = $_FILES['image_3']['name'];
            $loc3 = $_FILES['image_3']['tmp_name'];
            move_uploaded_file($loc3, "product_image/".$name3);

            $con->query("INSERT INTO product 
                (product_code,product_name,price,image_1,image_2,image_3,product_desc)
                VALUES('$code','$nama','$price','$name1','$name2','$name3','$desc')");

                echo "<div class='alert alert-info'>Data tersimpan</div>
                <meta http-equiv='refresh' content='1;url=product.php'>";
        }
    ?>

        

</body>
</html>