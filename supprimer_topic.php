<?php
include 'bd.php';
session_start();
$id = $_GET['id'];

$sql = "DELETE FROM topic WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    header('Location: administrateur.php');
    echo "le topic a été supprimé";
} else {
    echo "Error: synthax " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>