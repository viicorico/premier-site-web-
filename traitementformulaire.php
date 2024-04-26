<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fonction pour nettoyer les données du formulaire
    function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Définition des variables et initialisation à vide
    $nomErr = $prenomErr = $emailErr = $genreErr = $metierErr = $date_naissanceErr = $sujetErr = $contenuErr = "";
    $nom = $prenom = $email = $genre = $metier = $date_naissance = $sujet = $contenu = "";

    // Vérification et nettoyage des données du formulaire
    if (empty($_POST["nom"])) {
        $nomErr = "Le nom est requis";
    } else {
        $nom = clean_input($_POST["nom"]);
    }

    if (empty($_POST["prenom"])) {
        $prenomErr = "Le prénom est requis";
    } else {
        $prenom = clean_input($_POST["prenom"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "L'email est requis";
    } else {
        $email = clean_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Format d'email invalide";
        }
    }

    // Autres validations à ajouter selon vos besoins

    // Si toutes les données sont valides, envoi de l'e-mail
    if ($nomErr == "" && $prenomErr == "" && $emailErr == "" /* && autres vérifications */) {
        // Construction du corps de l'e-mail
        $message = "Nom: $nom\n";
        $message .= "Prénom: $prenom\n";
        $message .= "Email: $email\n";
        // Ajouter d'autres données au besoin

        // Destinataire de l'e-mail (adresse du webmaster)
        $destinataire = "webmaster@votresite.com";

        // Envoi de l'e-mail
        $sujet = "Nouveau message de contact depuis votre site";
        $headers = "From: $nom $prenom <$email>";

        if (mail($destinataire, $sujet, $message, $headers)) {
            // Affichage d'une alerte JavaScript
            echo "<script>alert('Le mail a bien été envoyé');</script>";
        } else {
            echo "Une erreur s'est produite lors de l'envoi du message.";
        }
    } else {
        // Affichage du formulaire avec les erreurs
        // Vous pouvez utiliser les variables $nom, $prenom, etc. pour pré-remplir le formulaire avec les données saisies précédemment
        // et les variables $nomErr, $prenomErr, etc. pour afficher les messages d'erreur à côté des champs correspondants
?>

