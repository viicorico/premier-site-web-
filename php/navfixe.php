<nav id="navfixe">
    <a href="index.html" class="logo">
        <img src="img/logo.PNG" alt="Guitar Gallery">
    </a>
    <div class="buttons">
        <!-- <button class="login">J'ai déjà un compte</button>
        <button class="register">S'enregistrer</button> -->
        <?php
        session_start();
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
            // Si l'utilisateur est connecté, affiche seulement le bouton "Se déconnecter"
            // Notez que j'ai changé l'action en 'deconnexion()' pour correspondre au script JS
            echo '<button onclick="deconnexion()">Se déconnecter</button>';
        } else {
            // Sinon, affiche les boutons "Login" et "Register"
            // Assurez-vous que la fonction 'connexion()' est bien définie dans votre fichier JS
            // Le texte du bouton "Login" a été modifié pour correspondre à votre demande
            echo '<button class="login" onclick="connexion()">J\'ai déjà un compte</button>';
            echo '<button class="register">S\'enregistrer</button>';
        }
        ?>
    </div>
</nav>