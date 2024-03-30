<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title> Creation du profil </title>
    <link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>
    <div class=parent>

        <div class="acceuil">
            <a href="connexion.php"> Connectez-vous </a>
        <h2> CREER PROFIL </h2>
        </div>
        <form action="register_action.php" method="post" >
        <label for="nom"> Pseudo: </label> 
        <input type="text" id="nom" name="pseudo" required>
        <br>

        <label for="date_naissance"> Date de naissance :</label>
        <input type="date" id="date_naissance" name="date_naissance">
        <br>

        
        <!-- <label for="roles">Choisissez votre role :</label>
        <select id="roles" name="roles">
            <option value="Administrateurs">Administrateurs</option>
            <option value="Utilisateurs">Utilisateurs</option>
            
            <br>
        </select> -->


        <label for="email">Email:</label> <br>
        <input type="email" id="email" name="email" required>
        <br>

        <label for="pswd"> Mot de passe: </label>
        <input type="password" id="pswd" name="pswd" required>
        <br>

        <label for="pswd2"> confirmer mot de passe : </label>
        <input type="password" id="pswd2" name="pswd2" required>
        <br>

        <label for="descriptions">Description : </label>
        <textarea  id="comment" name="descriptions" style="width: 296px; height: 88px;" required ></textarea>
        <input type="submit" value="S'inscrire">
        </form>
    

        
    </div>
</body>
</html>