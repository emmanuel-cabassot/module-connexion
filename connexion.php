<?php
/* On debute une session */
session_start();
/* Connexion a la base de donnée */
$db = mysqli_connect('localhost', 'root', '', 'moduleconnexion');

/* Vérificatin que login et password ont été renseignés et bouton submit ok */
if (isset($_POST['login']) AND isset($_POST['envoyer'])) 
{
    $login = $_POST['login'];
    if (isset($_POST['password'])) 
    {
        $password = $_POST['password'];

        /* recherche $login et $password dans base de donnée */
        $query = "SELECT * FROM `utilisateurs` WHERE login='$login' and password='$password'";
        
        /* La requete a t'elle aboutie? */
        $result = mysqli_query($db,$query) or die(mysql_error());

        /* Retourne le nombre de lignes dans un  résultat.*/
        $rows = mysqli_num_rows($result);

        /* Si il trouve une ligne qui correspond c'est ok (enregistre la valeur Session 'login' et redirection vers l'accueil) sinon message d'erreur */
        if ($rows==1) 
        {
            $_SESSION['login'] = $login;
            header("Location: index.php");
        }
            else
        {
            $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
        } 
    }  
}



?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mon_tech.css">
    <title>Connexion</title>
</head>
<body>
    <?php require('header.php')?>
    <main class="main_connexion">
        <section class=connexion>        
            <h1>Connexion</h1>        
            <section>
                <form action="" method="post">
                    <div class="erreur">
                        <p>
                        <?php
                            if (isset($message)) 
                            {
                                echo $message;
                            }
                        ?>
                        </p>  
                    <div>            
                        <label for="login">Login</label><br>
                        <input type="text" name="login" id="login" required>
                    </div>
                    <div>
                        <label for="pass">Mot de passe</label><br>
                        <input type="password" id="pass" name="password" minlength="4" required>
                    </div>
                    <div class=bouton>
                        <input type="submit" name="envoyer" value="Se connecter">
                    </div>
                </form>
            </section>
        </section>
    </main>
    <?php require('footer.php') ?>
</body>
</html>