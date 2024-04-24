<?php
session_start();

function lire_utilisateur($login) {
    $fichier = '../json/utilisateurs.json';
    if (file_exists($fichier)) {
        $contenu_fichier = file_get_contents($fichier);
        $utilisateurs = json_decode($contenu_fichier, true);
        if (isset($utilisateurs[$login])) {
            return $utilisateurs[$login];
        }
    }
    return null;
}

function verifier_identifiants($login, $mot_de_passe) {
    $utilisateur = lire_utilisateur($login);
    return $utilisateur !== null && $utilisateur['mot_de_passe'] === $mot_de_passe;
}

function rediriger($url) {
    header("Location: $url");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $mot_de_passe = $_POST["mot_de_passe"];

    if (verifier_identifiants($login, $mot_de_passe)) {
        // Authentification réussie, marque l'utilisateur comme connecté
        $_SESSION["logged_in"] = true;
        $_SESSION["login"] = $login; // Stocke le login de l'utilisateur dans la session
        rediriger("../index.php");
    } else {
        // Identifiants incorrects, redirection vers la page de connexion avec un message d'erreur
        header('Location: ./connexion.php?erreur=identifiants_incorrects');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #8B0000; /* Rouge foncé */
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: #800000; /* Rouge un peu plus foncé au survol */
}


        .error-message {
            color: #8B0000;
            font-style: italic;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Connexion</h2>
    <?php
    // Afficher un message d'erreur le cas échéant
    if (isset($_GET['erreur']) && $_GET['erreur'] === 'identifiants_incorrects') {
        echo "<p class='error-message'>Identifiants incorrects. Veuillez réessayer.</p>";
    }
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="login">Login :</label><br>
        <input type="text" id="login" name="login" required><br>
        <label for="mot_de_passe">Mot de passe :</label><br>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required><br><br>
        <input type="submit" value="Se connecter">
    </form>
    <p>Vous n'avez pas de compte? <a href="./inscription.php">Créez votre compte ici</a>.</p>
</div>

</body>
</html>
