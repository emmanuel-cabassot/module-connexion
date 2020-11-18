<?php
session_start();
$messageok = null;
// Connexion à MySQL
$db=mysqli_connect("localhost", "root", "", "moduleconnexion");

//Mettre dans la variable $request la sélection
$login = $_SESSION['login'];
$request = "SELECT `prenom`, `nom` FROM `utilisateurs` WHERE login='$login'";

//Appel la demande et la met dans $query
$query = mysqli_query($db, $request);

//Lit tous les résultats et retourne le résultat sous forme d'un tableau 
$recupdonnees = mysqli_fetch_assoc($query);

//Recupere le tableau dans des variables
$nom = $recupdonnees['nom'];
$prenom = $recupdonnees['prenom'];
$login = $_SESSION['login'];



if (isset($_POST['envoyer']) AND $_POST['password'] =! $_POST['confpass'])
{
    $message = 'Mot de passe et confirmation mot de passe différents';
}
else 
    {
        if(isset($_POST['envoyer']) ) 
        {
            // Réecriture des variables recupérées dans base de données
            $nom=$_POST['new_nom'];
            $prenom=$_POST['new_prenom'];
            $loginn=$_POST['new_login'];
            $password=$_POST['new_password'];

           
            // Requête de modification d'enregistrement
            $modifierprofil="UPDATE `utilisateurs` SET
            `nom`='$nom',
            `prenom`='$prenom',
            `login`='$loginn',
            `password`='$password'
            WHERE login='$login'";

            // Exécution de la requête
            $resultat=mysqli_query($db, $modifierprofil);
            // Contrôle sur la requête
            if(!$resultat) 
            {
                die('Erreur SQL !'.$modifierprofil.'<br />');
            }
            else 
            {
                $messageok = "<div class='alert alert-success'><h1>Requête validée !</h1><p> !</p>";'Votre profil à bien été modifié.';
                $_SESSION['nom'] = $loginn;
                $login = $loginn;                
            }

 
        } // Fin du test isset  
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mon_tech.css">
    <title>Votre profil</title>
</head>
<body>
    <?php require('header.php')?>
    <main class=main_profil>
        <section class=profil>        
            <h1>Modifier votre profil</h1>        
            <section>
                <form action="#" method="POST">
                    <div class=erreur>
                    <?php
                        if (isset($message)) 
                        {
                            echo $message;
                        }
                        if ($messageok != null) {
                            echo $messageok;
                        }
                    ?>
                    </div>
                    <div>
                        <label for="">Nom</label><br>
                        <input type="text" name="new_nom" id="nom"  required placeholder= <?php echo $nom; ?>>
                    </div>
                    <div>
                        <label for="prenom">Prénom</label><br>
                        <input type="text" name="new_prenom" id="prenom" required placeholder=<?php echo $prenom; ?>>
                    </div>
                        <label for="login">Login</label><br>
                        <input type="text" name="new_login" id="login" required placeholder=<?php echo $login; ?>>
                    <div>
                        <label for="pass">Mot de passe</label><br>
                        <input type="password" id="pass" name="new_password"  minlength="4" required>
                    </div>
                    <div>
                        <label for="confpass">Confirmer le mot de passe</label><br>
                        <input type="password" id="confpass" name="confpass" minlength="4" required>
                    </div>
                    <div class=bouton>
                        <input type="submit" name="envoyer" value="Enregistrer vos modifications">
                    </div>
                </form>
            </section>
        </section>
    </main>
    <?php require('footer.php')?>   
</body>
</html>