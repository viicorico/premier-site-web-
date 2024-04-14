<div class="menu_gauche">
    <a href="index.php">Accueil</a>
    <a href="electrique.php">Electrique</a>
    <a href="acoustique.php">Acoustique</a>
    <a href="amplificateur.php">Ampli</a>
    <a href="formulaire_contact.php">Contact</a>
    <?php
    if (session_status() == PHP_SESSION_NONE) {
         session_start();
    }
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
        // Affiche le bouton "Panier" avec un lien vers la page du panier
        echo '<a href="panier.php" class="panier">Panier</a>';
    }
    ?>
</div>


