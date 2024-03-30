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
            Ajouter votre forum
        </div>

        <form action="ajouter_topic_traitement.php" method="post">
        <label for="tire">Titre:</label> <br>
        <input type="text" id="titre" name="titre" required>
        <br>

        <label for="categorie">Choisissez une categorie :</label>
        <select name='categorie'>
        <?php 
        include 'bd.php';
        $sql = "SELECT id, nom FROM categorie";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<option value='' selected disabled>Selectionner une category</option>";               
            while ($row = $result->fetch_assoc()) {
                echo "<option name='categorie' value='" . $row['nom'] . "'>" . $row['nom'] . "</option>";
            }
        } else {
            echo "Aucune catégorie trouvée dans la base de données.";
        }
        
        ?>
        </select>
        
        <label for="descriptions">Message : </label>
        <textarea  id="message" name="message" style="width: 296px; height: 88px;" required ></textarea>
        <br>

        <input type="submit" value="Créer votre forum">
        </form>
        
        <a href="pageacceuil.php">
        <div class="buttons_actions">
            <button class="logout-btn">
                    Annuler
            </button>
        </a>
            
        </div>
    </div>

</body>
</html>