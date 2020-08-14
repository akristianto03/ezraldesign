<!DOCTYPE html>
<html>
    <head>
        <title>Checkout</title>
        <link type="text/css"
        rel="stylesheet"
        href="checkout.css"/>
        <link rel="icon" href="logo.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
                        THANKYOU
                    </div>
                </div>
            </div>
            <div class="content">

                <?php
                    if(isset($_POST['submit'])){
                        $conn = myConnectDB();
                        $id = $_GET['id'];
                        $sql = 'SELECT * FROM product WHERE id="'.$id.'"';
                        $result = mysqli_query($conn,$sql);
                    
                        if (mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_assoc($result)){
                                $img1 = $row['image_1'];
                                $code = $row['product_code'];
                            }
                        }else{
                            echo "0 result";
                        }

                        $nama = htmlspecialchars($_POST['name']);
                        $email = htmlspecialchars($_POST['email']);
                        $revision = htmlspecialchars($_POST['revision']);

                        mysqli_query($conn, "INSERT INTO order_product 
                            (product_code,buyer_name,buyer_email,design_instruct)
                            VALUES('$code','$nama','$email','$revision')");

                        mysqli_query($conn,"UPDATE product SET 
                        tampil = '-'
                        WHERE id = '$id'
                        ");

                        //mail

                        $to = 'ezralfredo@gmail.com';
                        $subject = 'New Design Order From Client!';
                        $message = 'Name : '.$nama."\n".'code : '.$code."\n".'Instruction : '.$revision;
                        $headers = 'From : '.$email;

                        mail($email,'Your order has been processed','Thank you for ordering on our website'."\n".'Please wait for confirmation from us'."\n"."\n".'- Ezralfredo','ezralfredo@gmail.com');

                        if(mail($to,$subject,$message,$headers)){
                            echo "
                            <script>
                            alert('Your order successfully recorded!');
                            </script>
                            ";
                        }else{
                            echo "
                            <script>
                            alert('Something went wrong!');
                            </script>
                            ";
                        }
                        

                    }else{
                        echo "
                        <script>
                            alert('Order product first!');
                            document.location.href = 'index.php';
                        </script>
                        ";
                    }
                    myCloseDB($conn);
                ?>

                <h4>Your order is in the process, please wait... <br>
                we will send an email to complete the <br>
                transaction</h4>
                <div class="back">
                    <img src="admin/product_image/<?= $img1; ?>">
                    <div class="backhome"><a href="index.php">Back to Home</a></div>
                </div>
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