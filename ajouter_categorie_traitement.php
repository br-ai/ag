<?php
include 'bd.php';
session_start();
$nom = $_POST['nom'];


$sql = "INSERT INTO categorie (nom) VALUES ('$nom')";

if ($conn->query($sql) === TRUE) {
    header('Location: administrateur.php');
} else {
    echo "Error: synthax " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>