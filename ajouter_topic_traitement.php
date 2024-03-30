<?php
include 'bd.php';
session_start();
$titre = $_POST['titre'];
$categorie = $_POST['categorie'];
$message = $_POST['message'];
$pseudo = $_SESSION['pseudo'];

$sql = "INSERT INTO topic (pseudo, categorie, titre, message) VALUES ('$pseudo', '$categorie', '$titre', '$message')";

if ($conn->query($sql) === TRUE) {
    header('Location: pageacceuil.php');
} else {
    echo "Error: synthax " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>