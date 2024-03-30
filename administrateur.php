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

<?php if ($_SESSION['role'] != 'Administrateurs'){
    header('Location: login.php');
};?>

    <div class="header">
        <div class="left_header">
            <div class="user_information">
                <span> Pseudo : <?php echo $_SESSION['pseudo'];?> </span>
                <span> Email : <?php echo $_SESSION['email'];?> </span>
                <span> Banniere : <?php echo $_SESSION['banniere'];?> </span>
                
            </div>
            <div class="action_button">
                <a href="deconnexion.php">
                    <button class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Déconnexion
                    </button>
                </a>
            </div>
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
                Vous etes sur la plateforme Administrateurs en tant que <?php echo $_SESSION['pseudo']?>
            </div>



            <h2> Liste des utilisateurs </h2>
            <div class="topic_parent">
                    
                    
                <?php 
                include 'bd.php';

                $requete = "SELECT * FROM utilisateurs";
                $resultat = $conn->query($requete);

                if ($resultat) {
              
                    if ($resultat->num_rows > 0) {
                 
                        while ($row = $resultat->fetch_assoc()) {
                            echo '
                            <div class="topic_enfant">
                                <h3>'. $row['pseudo'] .' ('. $row['statut'] .') </h3>
                                
                                <div class="buttons_actions">
                                    <a href="supprimer_compte.php?id='. $row['id'] .'">
                                        <button class="logout-btn">
                                            Supprimer le compte
                                        </button> 
                                    </a>
                                    
                                    

                                </div>
                            
                            </div>';
                        }
                    }
                    
                    else{
                        echo '0 topic';
                    }
                }?>
                
                    
                    

            </div>




            <h2> Liste des topics crées </h2>
            <div class="topic_parent">
                    
                    
                <?php 
                include 'bd.php';

                $requete = "SELECT * FROM topic";
                $resultat = $conn->query($requete);

                if ($resultat) {
              
                    if ($resultat->num_rows > 0) {
                 
                        while ($row = $resultat->fetch_assoc()) {
                            echo '
                            <div class="topic_enfant">
                                <h3>'. $row['titre'] .' ('. $row['categorie'] .') </h3>
                                <span class="createur">Crée par '. $row['pseudo'] .'</span>
                                <p> '. $row['message'] .'
                                </p>
                                <div class="buttons_actions">
                                    <a href="message.php?id='. $row['id'] .'&pseudo='. $row['pseudo'] .'&titre='. $row['titre'] .'&message='. $row['message'] .'&date='. $row['date'] .'&etat='. $row['etat'] .'">
                                        <button class="btn">
                                            Voir le topic
                                        </button> 
                                    </a>
                                    <a href="fermer_topic.php?id='. $row['id'] .'">
                                        <button class="logout-btn">
                                            fermer le topic
                                        </button> 
                                    </a>

                                    <a href="supprimer_topic.php?id='. $row['id'] .'">
                                        <button class="logout-btn">
                                            Supprimer le topic
                                        </button> 
                                    </a>
                                    

                                </div>
                            
                            </div>';
                        }
                    }
                    
                    else{
                        echo '0 topic';
                    }
                }?>
                
                    
                    

            </div>



            <h2> Liste des categories créees </h2>
            <div class="topic_parent">
                    
                    
                <?php 
                include 'bd.php';

                $requete = "SELECT * FROM categorie";
                $resultat = $conn->query($requete);

                if ($resultat) {
              
                    if ($resultat->num_rows > 0) {
                 
                        while ($row = $resultat->fetch_assoc()) {
                            echo '
                            <div class="topic_enfant">
                                <h3>'. $row['nom'] .'  </h3>
                                
                                <div class="buttons_actions">
                                    
                                    <a href="modifier_categorie.php?id='. $row['id'] .'">
                                        <button class="btn">
                                            modifier cette categorie
                                        </button> 
                                    </a>

                                    <a href="supprimer_categorie.php?id='. $row['id'] .'">
                                        <button class="logout-btn">
                                            Supprimer cette categorie
                                        </button> 
                                    </a>
                                    

                                </div>
                            
                            </div>';
                        }
                    }
                    
                    else{
                        echo '0 topic';
                    }
                }?>
                
                <div class="buttons_actions">
                <a href="ajouter_categorie.php">
                    <button class="ajouter_topic">
                        Ajouter une categorie
                    </button>
                </a>
                
            </div> 
                    

            </div>

    </div>

</body>
</html>