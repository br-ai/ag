<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title> acceuil </title>
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
</head>
<body>

    <?php 
    include 'bd.php';
    $id = $_GET['id'];
   
    $nom = "SELECT nom FROM categorie WHERE id = '$id'";
    $result = $conn->query($nom);
    
    if ($result) {
        $row = $result->fetch_assoc();
        $nom = $row['nom'];
    }
     ?>


    <div class="header">
        <div class="left_header">
            <div class="user_information">
                <span> Pseudo : <?php echo $_SESSION['pseudo'];?> </span>
                <span> Email : <?php echo $_SESSION['email'];?> </span>
                <span> Banniere : <?php echo $_SESSION['banniere'];?> </span>
                
            </div>
            <a href="deconnexion.php">
                <div class="action_button">  
                    <button class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Déconnexion
                    </button>
                </div>
            </a>
        </div>
        <div class="right_header">
            <h1>Freakit</h1>
            <p>chercher Topic</p>
            <form action="chercher_topic" style="width: 50%;" method="post">
            <input type="text" id="chercher" placeholder="Chercher un topic" name="chercher" required>
                <br>

            <input type="submit" value="chercher">
            </form>
        </div>
    </div>

    <div class="main">

            
        <div class="title">
            Modifier cette categorie
        </div>

        <form action="modifier_categorie_traitement.php?id=<?php echo $id ?>" method="post">
        <label for="tire">Nom:</label> <br>
        <input type="text" value=<?php echo $nom;?> id="nom" name="nom" required>
        <br>
        <input type="submit" value="Modifier cette categorie">
        </form>
        
        <a href="administrateur.php">
        <div class="buttons_actions">
            <button class="logout-btn">
                    Annuler
            </button>
        </a>
            
        </div>
    </div>

</body>
</html>