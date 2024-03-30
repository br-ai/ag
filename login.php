<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title> Connexion </title>
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
</head>
<body>
    <div class=parent>

       
        <div class="acceuil">
            <a href="register.php"> inscrivez vous </a>
        <h2> CONNEXION </h2>
        </div>
        <form action="login_action.php" method="post" >
        <label for="email">Email:</label> <br>
        <input type="email" id="email" name="email" required>
        <br>

        <label for="pswd"> Mot de passe: </label>
        <input type="password" id="pswd" name="pswd" required>
        <br>

        <input type="submit" value="Se connecter">
        </form>
    
    </div>
</body>
</html>