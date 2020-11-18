<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "jour08");
$requete = "SELECT * FROM `etudiants` WHERE 1";

// Query pour $resultat
$query = mysqli_query($db, $requete);
$resultat = mysqli_fetch_assoc($query);

// Query pour $donnees
$query_donnees = mysqli_query($db, $requete);
$donnees = mysqli_fetch_all($query_donnees);

//compte le nombre d'occurences dans $donnees[]
for ($ii=0; isset($donnees[$ii]) ; $ii++) {  
}

//compte le nombre d'occurences dans $donnees[][]
for ($nbi=0; isset($donnees[0][$nbi]) ; $nbi++) {    
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mon_tech.css">
    <title>Administrateur</title>
</head>
<body>
    <?php require('header.php')?>
    <?php
$db = mysqli_connect("localhost", "root", "", "moduleconnexion");
$requete = "SELECT * FROM `utilisateurs` WHERE 1";

// Query pour $resultat
$query = mysqli_query($db, $requete);
$resultat = mysqli_fetch_assoc($query);

// Query pour $donnees
$query_donnees = mysqli_query($db, $requete);
$donnees = mysqli_fetch_all($query_donnees);

//compte le nombre d'occurences dans $donnees[]
for ($ii=0; isset($donnees[$ii]) ; $ii++) {  
}

//compte le nombre d'occurences dans $donnees[][]
for ($nbi=0; isset($donnees[0][$nbi]) ; $nbi++) {    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main class=main_admin>
        <section class="page_admin">
            <table>
            <thead>
                <tr>
                    <?php foreach ($resultat as $key => $value) 
                    {
                    echo '<td>'.$key.'</td>';
                    }?>
                </tr>
            </thead>
            <tbody>
                    <?php for ($i=0; $i < $ii ; $i++) 
                    { 
                        echo '<tr>';
                        for ($nb=0; $nb < $nbi ; $nb++) 
                        { 
                            echo '<td>'.$donnees[$i][$nb].'</td>';
                        }
                        echo '</tr>';
                    }?>
                </tbody>
            </table>  
        </section>
    </main>
</body>
</html>
<?php
mysqli_close($db);
?>
    </main>
    <?php require('footer.php')?>
</body>
</html>