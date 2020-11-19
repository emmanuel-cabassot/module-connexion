<?php
session_start();
$erreur_modification = null;
$db = mysqli_connect('localhost', 'root', '', 'moduleconnexion');

// Contrôler la connexion
if (!$db)
{ 
    $MessageConnexion = die ("connection impossible");
}
else 
{   /* Vérifie que mot de passe à bien été confirmé */
    if (isset($_POST['envoyer']) AND  $_POST['password'] != $_POST['confirm_password']) 
    {
        $message = 'Mot de passe et confirmation du mot de passe sont différents';
    }
    // Autre contrôle pour vérifier si la variable $_POST['Bouton'] est bien définie et que la confirmation du mot de pass est ok
    if(isset($_POST['envoyer']) AND $_POST['password'] === $_POST['confirm_password']) 
    { 
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $login=$_POST['login'];
        $password=$_POST['password'];

        // Requête d'insertion
        $nouvelle_inscription="INSERT INTO utilisateurs (nom, prenom, login, password) VALUES ('$nom', '$prenom', '$login', '$password')";
        // Exécution de la reqête
        $requete_enregistree = mysqli_query($db, $nouvelle_inscription) or die('Erreur SQL !'.$nouvelle_inscription.'<br>'.mysqli_error($db));
        if (isset($requete_enregistree)) {
            header("Location: connexion.php");
        }
        else{
            $erreur_modification = 'Erreur sur l\'enregistrement de votre profil.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mon_tech.css">
    <title>Inscription</title>
</head>
<body>
    <?php require('header.php')?>
    <main class=main_inscription>      
        <section class=formulaire>        
            <h1>Formulaire d'inscription</h1>        
            <section>
                <form action="" method="post">
                    <div class = erreur>
                    <p>
                    <?php 
                    if (isset($message)) 
                    {
                        echo $message;
                    }
                    if (isset($erreur_modification)) 
                    {
                        echo $erreur_modification;
                    }
                    ?>  
                    </p>                  
                    </div>
                    <div>
                        <label for="">Nom</label><br>
                        <input type="text" name="nom" id="nom" required>
                    </div>
                    <div>
                        <label for="prenom">Prénom</label><br>
                        <input type="text" name="prenom" id="prenom" required>
                    </div>
                        <label for="login">Login</label><br>
                        <input type="text" name="login" id="login" required>
                    <div>
                        <label for="pass">Mot de passe</label><br>
                        <input type="password" id="pass" name="password" minlength="2" required>
                    </div>
                    <div>
                        <label for="conf_pass">Confirmer le mot de passe</label><br>
                        <input type="password" id="conf_pass" name="confirm_password" minlength="2" required>
                    </div>
                    <div class=bouton>
                        <input type="submit" name = "envoyer" value="Envoyer le formulaire" >
                    </div>
                   
                </form>
            </section>
        </section>
    </main>
    <?php require('footer.php')?>  
</body>
</html>