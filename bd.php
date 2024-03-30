<?php


    $servername = "192.168.56.133";

    $username = "freakit";
    
    $password = "freakit";
    
    $dbname = "bd";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);
    $conn->close();

}




?>

