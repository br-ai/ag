<?php
include 'bd.php';
session_start();
$id = $_GET['id'];

$sql = "UPDATE topic SET etat = 'ferme' WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    header('Location: pageacceuil.php');
    echo "le topic a été cloturé";
} else {
    echo "Error: synthax " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>