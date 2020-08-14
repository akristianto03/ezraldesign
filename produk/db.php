<?php
function myConnectDB(){
    $conn = new mysqli('localhost','ezraldes_ezralfredo','2GrRI&_n^i)i(F)4','ezraldes_ezraldesign');

    if($conn -> connect_error){
        echo "Failed to connect to MySQL: ".$conn -> connect_error; 
    }
    return $conn;
}

function myCloseDB($conn){
    mysqli_close($conn);
}
?>