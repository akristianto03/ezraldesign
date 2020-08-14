<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link type="text/css"
        rel="stylesheet"
        href="style.css"/>
        <link rel="icon" href="logo.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <?php
            include_once("db.php");
        ?>

        <div class="container">
            <img class="bg" src="bg.png">
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
                    <div class="search">
                    
                    </div>
                    <div class="aside">DESIGN FOR YOU</div>
                    <div class="titledesc">
                        <h2>Fresh Design</h2>
                        <p class="desc">Ezraldesign is a website that sells various design products such as logos, assets and others that are ready to use for commercial or other purposes.</p>
                        <ul>
                            <li class="benefit"><img src="check.png" class="check"> Hand-selected design only </li>
                            <li class="benefit"><img src="check.png" class="check"> Customization included</li>
                            <li class="benefit"><img src="check.png" class="check"> Industry-standard Vector EPS</li>
                            <li class="benefit"><img src="check.png" class="check"> Crystal clear money-back guarantee </li>
                        </ul>
                    </div>
                    <div class="buynow"><a href="catalog.php">Buy-Now</a></div>
                </div>
            </div>
            <div class="content">
                <h2>New for Sale</h2>

                <?php
                    $conn = myConnectDB();

                    $sql = 'SELECT * FROM product';
                    $result = mysqli_query($conn,$sql);

                    if (mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                            if($row['tampil'] != '-'){
                ?>

                    <div class="boxcontent">
                        <div class="box">
                            <a href="detail.php?id=<?= $row['id']; ?>">
                            <img src="admin/product_image/<?= $row['image_1']; ?>">
                                <div class="info">
                                    <div class="textinfo">
                                        <?= $row['product_name']; ?> <br>
                                        IDR <?= number_format($row['price']); ?>
                                    </div>
                                    <div class="buy"><a href="buy.php?id=<?= $row['id']; ?>">Buy</a></div>
                                </div>
                            </a>
                        </div>
                    </div>

                <?php
                        }}}else{
                        }
                        myCloseDB($conn);
                ?>

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
    </body>
</html>