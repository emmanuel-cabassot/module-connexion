<header>
    <section class = header_toolbar>
        <section class = header_logo>
        <a href="index.php"><img src="image/outils.png" alt="logo outils"> Mon technicien chaudière</a>
        </section>
        
        <section class = header_nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="index.php">Trouver mon techncien</a></li>
            <?php
            /* Affiche Admin, Profil ou Inscription */
            if (isset($_SESSION['login']) AND $_SESSION['login'] == 'admin') 
            {
                echo '<li><a href="admin.php">Admin</a></li>';
            }
            elseif (isset($_SESSION['login']) AND $_SESSION['login'] != 'admin') 
            {
                echo '<li><a href="profil.php">profil</a></li>';
            }
            else 
            {
                echo '<li><a href="inscription.php">S\'inscrire</a></li>';
            }
            /* Affiche Se connecter ou Se déconnecter */
            if (!isset($_SESSION['login'])) 
            {
                echo '<li><a href="connexion.php">Se connecter</a></li>';
            }
            else 
            {
                echo '<li><a href="deconnection.php">Se déconnecter</a></li>';
            }
            ?>
        </ul>
        </section>
    </section>
    <section class = header_slogan>
    <h1>
    <?php
        if (!isset($_SESSION['login'])) 
        {
            echo '<p>Trouver votre technicien pour votre chaudière</p>';
        }
        if  (isset($_SESSION['login']) AND $_SESSION['login'] === 'admin') 
        {
            echo '<p>Au boulot feignasse!!!</p>';
        }
        if (isset($_SESSION['login']) AND $_SESSION['login'] != 'admin')
        {
            echo '<p>Bonjour '.$_SESSION['login'].', votre technicien vous attend</p>';
        }
    ?>
    </h1>
    </section>
</header>