<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>

<h2>Créer un compte</h2>

<form action="/DevGuitare/php/traitement.php" method="post">
    <label for="prenom">Prénom :</label><br>
    <input type="text" id="prenom" name="prenom" required><br><br>

    <label for="nom">Nom :</label><br>
    <input type="text" id="nom" name="nom" required><br><br>

    <label for="login">Nom d'utilisateur (Login):</label><br>
    <input type="text" id="login" name="login" required><br><br>

    <label for="email">Adresse e-mail:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="mot_de_passe">Mot de passe:</label><br>
    <input type="password" id="mot_de_passe" name="mot_de_passe" required><br><br>

    <label for="confirm_mot_de_passe">Confirmer le mot de passe:</label><br>
    <input type="password" id="confirm_mot_de_passe" name="confirm_mot_de_passe" required><br><br>

    <label for="date_naissance">Date de naissance:</label><br>
    <input type="date" id="date_naissance" name="date_naissance" required><br><br>

    <label for="adresse">Adresse:</label><br>
    <input type="text" id="adresse" name="adresse" required><br><br>

    <input type="submit" value="Créer un compte">
</form>

</body>
</html>
