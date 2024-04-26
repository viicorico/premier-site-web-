<?php

session_start();

// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "";
$base_de_donnees = "guitar_galley_data"; 
$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $base_de_donnees);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("La connexion a échoué : " . $connexion->connect_error);
}



// Fonction pour insérer les données des produits dans la base de données
function insererProduits($connexion, $sousCategories) {
    foreach ($sousCategories as $sousCategorie) {
        $reference = $connexion->real_escape_string($sousCategorie['reference']);
        $description = $connexion->real_escape_string($sousCategorie['description']);
        $prix = $connexion->real_escape_string($sousCategorie['prix']);
        $stock = $connexion->real_escape_string($sousCategorie['stock']);
        $image = $connexion->real_escape_string($sousCategorie['image']);
        $categorie_id = $connexion->real_escape_string($sousCategorie['categorie_id']);
        $requete = "INSERT INTO produits (reference, description, prix, stock, image, categorie_id) VALUES ('$reference', '$description', '$prix', '$stock', '$image', '$categorie_id')";
        if (!$connexion->query($requete)) {
            echo "Erreur lors de l'insertion du produit '$reference': " . $connexion->error . "<br>";
        }
    }
}

// Fonction pour insérer les données des clients dans la base de données
function insererClients($connexion, $utilisateurs) {
    foreach ($utilisateurs as $utilisateur) {
        $prenom = $connexion->real_escape_string($utilisateur['prenom']);
        $nom = $connexion->real_escape_string($utilisateur['nom']);
        $login = $connexion->real_escape_string($utilisateur['login']);
        $email = $connexion->real_escape_string($utilisateur['email']);
        $mot_de_passe = $connexion->real_escape_string($utilisateur['mot_de_passe']);
        $date_naissance = $connexion->real_escape_string($utilisateur['date_naissance']);
        $adresse = $connexion->real_escape_string($utilisateur['adresse']);

        $requete = "INSERT INTO clients (prenom, nom, login, email, mot_de_passe, date_naissance, adresse) VALUES ('$prenom', '$nom', '$login','$email','$mot_de_passe', '$date_naissance','$adresse')";
        if (!$connexion->query($requete)) {
            echo "Erreur lors de l'insertion du client '$nom': " . $connexion->error . "<br>";
        }
    }
}

// Récupérer les données des produits depuis $_SESSION
if(isset($_SESSION['sousCategories'])) {
    $sousCategories = $_SESSION['sousCategories']; 

    insererProduits($connexion, $sousCategories);
} else {
    echo "Erreur: aucune donnée de produits trouvée dans la session.";
}


// Récupérer les données des clients depuis $_SESSION
if(isset($_SESSION['utilisateurs'])) {
    $utilisateurs = $_SESSION['utilisateurs']; 

    insererClients($connexion, $utilisateurs);
} else {
    echo "Erreur: aucune donnée de clients trouvée dans la session.";
}


$connexion->close();
?>
