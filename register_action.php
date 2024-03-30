<?php
include 'bd.php';

$pseudo = $_POST['pseudo'];
$date_naissance = $_POST['date_naissance'];
$roles = 'Utilisateurs';
$email = $_POST['email'];
$pswd = $_POST['pswd'];
$pswd2 = $_POST['pswd2'];
$description = $_POST['descriptions'];


$pseudo_unique = "SELECT * FROM utilisateurs WHERE pseudo = '$pseudo'";
$result = $conn->query($pseudo_unique);

if (mysqli_num_rows($result) > 0) {
    echo 'le pseudo est deja utilisé, reeesayé';
    exit();
}


$mail_unique = "SELECT * FROM utilisateurs WHERE mail = '$email'";
$resultat = $conn->query($mail_unique);

if (mysqli_num_rows($resultat) > 0) {
    echo 'le mail est deja utilisé, reeesayé';
    exit();
}

if ($pswd === $pswd2) {
    $hashed_pswd = password_hash($pswd, PASSWORD_DEFAULT);
    $sql = "INSERT INTO utilisateurs (pseudo, mail, password, date_naissance, role, banniere) VALUES ('$pseudo', '$email', '$hashed_pswd', '$date_naissance', '$roles', '$description')";

    if ($conn->query($sql) === TRUE) {
        header('Location: login.php');
    } else {
        echo "Error: synthax " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Les mots de passe ne correspondent pas.";
}

$conn->close();
?>