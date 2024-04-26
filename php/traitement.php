<?php
// Vérification des données envoyées via la méthode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si tous les champs requis sont remplis
    if (isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['login']) && isset($_POST['email']) && isset($_POST['mot_de_passe']) && isset($_POST['confirm_mot_de_passe']) && isset($_POST['date_naissance']) && isset($_POST['adresse'])) {
        
        // Récupération des données du formulaire
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $login = $_POST['login'];
        $email = $_POST['email'];
        $mot_de_passe = $_POST['mot_de_passe'];
        $confirm_mot_de_passe = $_POST['confirm_mot_de_passe'];
        $date_naissance = $_POST['date_naissance'];
        $adresse = $_POST['adresse'];
        
        // Vérifier si les mots de passe correspondent
        if ($mot_de_passe === $confirm_mot_de_passe) {
            // Charger les données des utilisateurs existants depuis le fichier JSON
            $utilisateurs_json = file_get_contents('../json/utilisateurs.json');
            $utilisateurs = json_decode($utilisateurs_json, true);

            // Vérifier si l'utilisateur existe déjà
            if (isset($utilisateurs[$login])) {
                echo "<script>alert('Le nom d\\'utilisateur existe déjà');</script>";
                echo "<script>window.location.replace('inscription.php');</script>";
                exit;
            }
            if (isset($utilisateurs[$email])) {
                echo "<script>alert('L\\'adresse e-mail existe déjà');</script>";
                echo "<script>window.location.replace('inscription.php');</script>";
                exit;
            }

            // Création du tableau associatif des données utilisateur
            $utilisateur = array(
                'prenom' => $prenom,
                'nom' => $nom,
                'login' => $login,
                'email' => $email,
                'mot_de_passe' => $mot_de_passe,
                'date_naissance' => $date_naissance,
                'adresse' => $adresse
            );

            // Ajouter l'utilisateur au tableau des utilisateurs avec le login comme clé
            $utilisateurs[$login] = $utilisateur;

            // Encodage des données en JSON
            $json_data = json_encode($utilisateurs);

            // Écriture des données dans un fichier JSON
            $file_name = '../json/utilisateurs.json';
            $result = file_put_contents($file_name, $json_data);

            // Vérifier si l'écriture dans le fichier JSON a réussi
            if ($result === false) {
                // En cas d'échec de l'écriture, afficher une alerte d'erreur
                echo "<script>alert('Erreur lors de l\\'écriture des données');</script>";
                echo "<script>window.location.replace('inscription.php');</script>";
                exit;
            }

            // Redirection vers la page index.html avec un message de confirmation
            echo "<script>alert('Compte créé avec succès');</script>";
            echo "<script>window.location.replace('../index.php');</script>";
            exit;
        } else {
            // Les mots de passe ne correspondent pas, afficher une alerte d'erreur
            echo "<script>alert('Les mots de passe ne correspondent pas');</script>";
            echo "<script>window.location.replace('inscription.php');</script>";
            exit;
        }
    } else {
        // Certains champs requis ne sont pas remplis, afficher une alerte d'erreur
        echo "<script>alert('Tous les champs sont requis');</script>";
        echo "<script>window.location.replace('inscription.php');</script>";
        exit;
    }
}
?>
