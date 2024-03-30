<?php
include 'bd.php';
session_start();
$id = $_GET['id'];

$sql = "DELETE FROM utilisateurs WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    header('Location: administrateur.php');
    echo "utilisateur  supprimé";
} else {
    echo "Error: synthax " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>