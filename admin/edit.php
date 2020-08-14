<?php
include('logincheck.php');
if(!isset($_SESSION['user'])){
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update-Product</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <?php include 'links.php'?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

    <?php

        if($_GET['id']){
            $id = $_GET['id'];
            $ambil = $con->query("SELECT * FROM product WHERE id='$id'");
            while($pecah = $ambil->fetch_assoc()){
                $code = $pecah['product_code'];
                $nama = $pecah['product_name'];
                $price = $pecah['price'];
                $img1 = $pecah['image_1'];
                $img2 = $pecah['image_2'];
                $img3 = $pecah['image_3'];
                $desc = $pecah['product_desc'];
            }

            

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

                if(!empty($loc1)){
                    $img1 = $name1;
                }if(!empty($loc2)){
                    $img2 = $name2;
                }if(!empty($loc3)){
                    $img3 = $name3;
                }
    
                mysqli_query($con,"UPDATE product SET 
                    product_code = '$code',
                    product_name = '$nama',
                    price = '$price',
                    image_1 = '$img1',
                    image_2 = '$img2',
                    image_3 = '$img3',
                    product_desc = '$desc'
                    WHERE id = '$_GET[id]'
                    ");

                    
                    echo "<div class='alert alert-info'>Data terupdate</div>
                    <meta http-equiv='refresh' content='1;url=product.php'>";
            }
        }
    ?>

    <div class="form center-div">
        <h2>Update Product <?= $code; ?></h2>
        <form action="" class="form-group" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="<?= $nama; ?>">
            </div>
            <div class="form-group">
                <label>Code</label>
                <input type="text" class="form-control" name="code" value="<?= $code; ?>">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" class="form-control" name="price" value="<?= $price; ?>">
            </div>
            <div class="form-group">
                <label>Images</label>
                <input type="file" class="form-control" name="image_1">
                <input type="file" class="form-control" name="image_2">
                <input type="file" class="form-control" name="image_3">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="desc" class="form-control" rows="10"><?= $desc; ?></textarea>
            </div>
            <input type="submit" class="btn btn-success" name="save" value="Save">
        </form>
    </div>
    

        

</body>
</html>