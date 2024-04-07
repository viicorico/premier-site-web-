<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
    <style>
        /* Style pour le carré */
        .login-button {
            width: 100px;
            height: 100px;
            background-color: #ccc; /* Couleur de fond */
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer; /* Curseur de la souris indiquant une action possible */
        }
    </style>
</head>
<body>

    <h1>Page d'accueil</h1>
    
    <?php
    session_start(); // Démarrer la session
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
        // Si l'utilisateur est connecté, affiche un bouton "Se déconnecter"
        echo '<div class="login-button" onclick="deconnexion()">Se déconnecter</div>';
    } else {
        // Sinon, affiche un bouton "Se connecter"
        echo '<div class="login-button" onclick="connexion()">Se connecter</div>';
    }
    ?>

    <script>
        // Fonction pour la connexion
        function connexion() {
            window.location.href = "connexion.php";
        }

        // Fonction pour la déconnexion
        function deconnexion() {
            window.location.href = "deconnexion.php";
        }
    </script>

</body>
</html>
