<nav id="navfixe">
    <a href="index.html" class="logo">
        <img src="img/logo.PNG" alt="Guitar Gallery">
    </a>
    <div class="buttons">
        <!-- <button class="login">J'ai déjà un compte</button>
        <button class="register">S'enregistrer</button> -->
    <?php
    if (session_status() == PHP_SESSION_NONE) {
         session_start();
    }
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
        // Si l'utilisateur est connecté, affiche un bouton "Se déconnecter"
        echo '<button class="login" onclick="deconnexion()">se déconnecter</button>';
    } else {
        // Sinon, affiche un bouton "Se connecter"
        echo '<button class="login" onclick="connexion()">se connecter</button>';     
    }
        echo '<button class="register" onclick="enregistrer()">S\'enregistrer</button>';
    ?>
    <script src="js/connexion.js"></script>
    </div>
</nav>