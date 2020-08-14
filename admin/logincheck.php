<?php
    session_start();

    $con = mysqli_connect('localhost','ezraldes_ezralfredo','2GrRI&_n^i)i(F)4');
    if($con){
        echo "connection successful";
    }else{
        echo "no connection";
        header('location:index.php');
    }

    $db = mysqli_select_db($con, 'ezraldes_ezraldesign');

    if(isset($_POST['submit'])){
        $username = $_POST['user'];
        $password = $_POST['pass'];

        $sql = "SELECT * FROM adminlogin WHERE user='$username' and pass='$password'";
        $query = mysqli_query($con,$sql);

        $row = mysqli_num_rows($query);
            if($row>0){
                echo "login successful";
                $_SESSION['user'] = $username;
                header('location:adminmainpage.php');
            }else{
                echo "login failed";
                header('location:index.php');
            }
        
    }
?>