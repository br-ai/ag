<?php
include 'bd.php';
session_start();
$id = $_GET['id'];

$sql = "DELETE FROM categorie WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    header('Location: administrateur.php');
    echo "categorie  supprimé";
} else {
    echo "Error: synthax " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>