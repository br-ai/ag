<?php
include 'bd.php';
session_start();
$id = $_GET['id'];
$message = $_POST['message'];
$pseudo = $_SESSION['pseudo'];

$sql = "INSERT INTO commentaires (pseudo, forum, message) VALUES ('$pseudo', '$id', '$message')";

if ($conn->query($sql) === TRUE) {
    header('Location: pageacceuil.php');
} else {
    echo "Error: synthax " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>