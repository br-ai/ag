<?php
include 'bd.php';
session_start();
$id = $_GET['id'];
$nom = $_POST['nom'];

$sql = "UPDATE categorie SET nom = '$nom' WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    header('Location: administrateur.php');
    echo "la categorie a été modifié";
} else {
    echo "Error: synthax " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>