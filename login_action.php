<?php

session_start();

include 'bd.php';

$email = $_POST['email'];

$pwd = $_POST['pswd'];


$sql = "SELECT * FROM utilisateurs WHERE mail = '$email'";

$result = $conn->query($sql);


if ($result) {

    $row = $result->fetch_assoc();

    $id = $row['mail'];

    $hashed_pwd = $row['password'];

    $pseudo = $row['pseudo'];

    $banniere = $row['banniere'];

    $role = $row['role'];


    if (password_verify($pwd, $hashed_pwd)) {

        $_SESSION['loggedin'] = true;

        $_SESSION['id'] = $id;

        $_SESSION['email'] = $email;

        $_SESSION['pseudo'] = $pseudo;

        $_SESSION['banniere'] = $banniere;

        $_SESSION['role'] = $role;

        header('Location: pageacceuil.php');

    } else {
   
        echo "Le mot de passe ou utilisateur est incorrect.";

    }

} else {

    echo "Le mot de passe ou utilisateur est incorrect.";

}


$conn->close();

?>