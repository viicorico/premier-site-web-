<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    
</head>
<body>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
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
        input[type="email"],
        input[type="password"],
        input[type="date"],
        input[type="submit"] {
            width: 80%; /* Réduire la largeur des éléments de formulaire */
            max-width: 300px; /* Limiter la largeur maximale */
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box; /* Pour inclure le padding et la bordure dans la largeur */
        }

        input[type="submit"] {
            background-color: #8B0000; /* Rouge foncé */
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #800000; /* Rouge un peu plus foncé au survol */
        }
    </style>

<div class="container">
    <h2>Créer un compte</h2>

    <form action="./traitement.php" method="post">
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>

        <label for="login">Nom d'utilisateur (Login):</label>
        <input type="text" id="login" name="login" required>

        <label for="email">Adresse e-mail:</label>
        <input type="email" id="email" name="email" required>

        <label for="mot_de_passe">Mot de passe:</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required>

        <label for="confirm_mot_de_passe">Confirmer le mot de passe:</label>
        <input type="password" id="confirm_mot_de_passe" name="confirm_mot_de_passe" required>

        <label for="date_naissance">Date de naissance:</label>
        <input type="date" id="date_naissance" name="date_naissance" required>

        <label for="adresse">Adresse:</label>
        <input type="text" id="adresse" name="adresse" required>

        <input type="submit" value="Créer un compte">
    </form>
</div>

</body>
</html>
