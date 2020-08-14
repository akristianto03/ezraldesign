<!DOCTYPE html>
<html>
    <head>
        <title>Contact</title>
        <link type="text/css"
        rel="stylesheet"
        href="contact.css"/>
        <link rel="icon" href="logo.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>

        <?php
            if(isset($_POST['submit'])){
                        $to = 'ezralfredo@gmail.com';
                        $subject = 'New ask from '.$_POST['name'];
                        $message = $_POST['paragraph'];
                        $headers = 'From : '.$_POST['email'];

                        if(mail($to,$subject,$message,$headers)){
                            echo "
                            <script>
                            alert('Success talk to a human');
                            </script>
                            ";
                        }else{
                            echo "
                            <script>
                            alert('Something went wrong!');
                            </script>
                            ";
                        }
            }
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
                        CONTACT
                    </div>
                </div>
            </div>
            <div class="content">
                <h2>Talk to a Human</h2>
                <div class="boxcon">
                    <form action="" method="post" class="form">
                        Your name <br>
                        <input name="name" type="text" class="form-control" required><br>
                        Your email Address <br>
                        <input name="email" type="email" class="form-control" required><br>
                        Messages <br>
                        <textarea name="paragraph" class="form-control" rows="4" required></textarea><br>
                        <input type="submit" name="submit" class="form-control submit" value="Send">
                    </form>
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