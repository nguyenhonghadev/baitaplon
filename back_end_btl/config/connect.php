<?php
$servername="localhost";
$username="root";
$password="";
$db="hk-restaurant";
$conn = new mysqli( $servername, $username, $password, $db );
if( $conn->connect_error ) {
    echo"Kết nỗi bị lỗi". $conn->connect_error;
}


?>