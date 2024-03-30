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

            <?php 
                include 'bd.php';
                
                $pseudo = $_GET['pseudo'];
                $id = $_GET['id'];
                $titre = $_GET['titre'];
                $message = $_GET['message'];
                $date = $_GET['date'];
                $etat = $_GET['etat'];
            ?>
            <div class="title">
                Le topic : <?php echo $titre?>
            </div>
            <div class="topic_parent">

                
                <div class="topic_enfant">

                    <div class="date_comment">
                        <?php echo $date;?>
                        <?php if ($_SESSION['pseudo'] == $pseudo){
                            echo '<a href="fermer_topic.php?id='. $id .'">
                            <button class="logout-btn">
                                <i class="fas fa-sign-out-alt"></i> fermer le topic
                            </button>
                        </a>';}?>
                        
                    </div>

                    <div class="createur_comment">
                        <h3><?php echo $pseudo;?> <?php if ($etat == 'ferme'){ echo '<span class="alert">topic fermé</span>';}?></h3>
                    </div>

                    <div class="topic_message">
                        <b><?php echo $titre;?></b>
                    </div>

                    <div class="message">
                        <p><?php echo $message;?>

                        </p>
                    </div>
                    <div class="banniere">
                        <hr>
                        <p><?php
                        $banniere = "SELECT banniere FROM utilisateurs WHERE pseudo = '$pseudo'";
                        $result = $conn->query($banniere);
                        
                        if ($result) {
                            $row = $result->fetch_assoc();
                            $banniere = $row['banniere'];
                        }
                        echo $banniere ?>
                        </p>
                    </div>
                    
                
                </div>


                <?php 
                include 'bd.php';

                $requete = "SELECT * FROM commentaires";
                $resultat_requete = $conn->query($requete);

                if ($resultat_requete) {
                    // Vérifier s'il y a des résultats
                    if ($resultat_requete->num_rows > 0) {
                        // Afficher les données
                        while ($rows = $resultat_requete->fetch_assoc()) {
                            echo '
                    <div class="topic_enfant">

                        <div class="date_comment">
                        '. $rows['date'] .'
                        </div>

                        <div class="createur_comment">
                            <h3>'. $rows['pseudo'] .'</h3>
                        </div>

                        <div class="topic_message">
                            Reponse <b>'. $titre .'</b>
                        </div>

                        <div class="message">
                            <p>'. $rows['message'] .'

                            </p>
                        </div>

                        <div class="banniere">
                            <hr>
                            <p>';
                                $pseudo_user = $rows['pseudo'];
                                $banniere = "SELECT banniere FROM utilisateurs WHERE pseudo = '$pseudo_user'";
                                $result = $conn->query($banniere);
                                
                                if ($result) {
                                    $row = $result->fetch_assoc();
                                    $banniere = $row['banniere'];
                                }
                                echo $banniere;
                           echo ' </p>
                        </div>
                        
                    
                    </div>';}
                        }

                        else{
                            echo '0 message trouvé';
                        }
                    }?>


                    <?php if ($etat == 'ouvert'){
                        echo '<div class="new_message">
                        <form action="message_traitement.php?id='. $id .'" method="post">
                            
                            <textarea  id="message" placeholder="Ajouter votre message ici" name="message" style="width: 296px; height: 88px;" required ></textarea>
                            <br>
                            <input type="submit" value="commenter">
                        </form>
                    </div>';
                    }
                    
                    else{
                        echo 'le topic est fermé donc aucun message';
                    }?>
                
                    
                    
                
                
                    
                    

            </div>

            
    </div>

</body>
</html>