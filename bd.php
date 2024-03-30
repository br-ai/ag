<?php


    $servername = "192.168.56.133";

    $username = "root";
    
    $password = "root";
    
    $dbname = "bd";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);
    $conn->close();

}




?>

