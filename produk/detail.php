<!DOCTYPE html>
<html>
    <head>
        <title>Product Detail</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link type="text/css"
        rel="stylesheet"
        href="detail.css"/>
        <link rel="icon" href="logo.png">
    </head>
    <body>
        <?php
            include_once('db.php');
        ?>

        <div class="container">
            <img class="bg" src="bgh.png">
            <div class="head">
                <div class="isihead">
                    <div class="logotitle">
                        <a href="index.php"><img class="logo" src="logo.png"></a>
                        <div class="ez"><a href="index.php">EZRALDESIGN</a></div>
                    </div>
                    <div class="navbar">
                        <div class="yellowblock"></div>
                        <div class="navigation">
                            <div><a href="about.php">ABOUT</a></div>
                            <div><a href="contact.php">CONTACT</a></div>
                        </div>
                    </div>
                    <div class="title">
                        DETAIL
                    </div>
                </div>
            </div>
            <div class="content">
                <?php
                    $conn = myConnectDB();
                    $id = $_GET['id'];
                    $sql = 'SELECT * FROM product WHERE id="'.$id.'"';
                    $result = mysqli_query($conn,$sql);
                    
                    if (mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                            $name = $row['product_name'];
                            $price = number_format($row['price']);
                            $img1 = $row['image_1'];
                            $img2 = $row['image_2'];
                            $img3 = $row['image_3'];
                            $desc = $row['product_desc'];
                        }
                    }else{
                        echo "0 result";
                    }
                    myCloseDB($conn);
                ?>

                <h2><?= $name; ?></h2>
                <div class="pic">


                        <div class="col-sm-12">
                        
                            <div id="my-slider" class="carousel slide" data-ride="carousel">
                                <!-- dot nov -->
                                <ol class="carousel-indicators">
                                    <li data-target="#my-slider" data-slide-to="0"></li>
                                    <li data-target="#my-slider" data-slide-to="1"></li>
                                    <li data-target="#my-slider" data-slide-to="2"></li>
                                </ol>

                                <!-- wrapper for slide -->
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <img src="admin/product_image/<?= $img1; ?>" alt="">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="admin/product_image/<?= $img2; ?>" alt="">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="admin/product_image/<?= $img3; ?>" alt="">
                                    </div>
                                </div>

                            </div>

                        </div>


                </div>
                <p><?= $desc; ?></p>
                <h3>IDR <?= $price; ?></h3>
                <div class="buy"><a href="buy.php?id=<?= $id; ?>">Buy</a></div>
                <ul>
                    <li class="benefit"><img src="check.png" class="check"> Hand-selected design only </li>
                    <li class="benefit"><img src="check.png" class="check"> Customization included</li>
                    <li class="benefit"><img src="check.png" class="check"> Industry-standard Vector EPS</li>
                    <li class="benefit"><img src="check.png" class="check"> Crystal clear money-back guarantee </li>
                </ul>
            </div>
            <div class="footer">
                <div class="logofooter">
                    <img class="logo" src="logo.png">
                    <div class="ez">EZRALDESIGN</div>
                </div>
                <div class="socmed">
                    <a href="https://www.instagram.com/ezralfredo/?hl=id"> <img class="icon" src="ig.png"> </a>
                    <hr class="hr1">
                    <a href="mailto:ezralfredo@gmail.com"> <img class="icon" src="mail.png"> </a>
                    <hr class="hr2">
                    <a href="https://api.whatsapp.com/send?phone=6281357160052"> <img class="icon" src="telephone.png"> </a>
                </div>
            </div>
        </div>


        <!-- jQuery library -->
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </body>
</html>