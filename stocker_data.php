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
function insererProduits($connexion, $produits) {
    foreach ($produits as $produit) {
        $reference = $connexion->real_escape_string($produit['reference']);
        $description = $connexion->real_escape_string($produit['description']);
        $prix = $connexion->real_escape_string($produit['prix']);
        $stock = $connexion->real_escape_string($produit['stock']);
        $image = $connexion->real_escape_string($produit['image']);
        $categorie_id = $connexion->real_escape_string($produit['categorie_id']);
        $requete = "INSERT INTO produits (reference, description, prix, stock, image, categorie_id) VALUES ('$reference', '$description', '$prix', '$stock', '$image', '$categorie_id')";
        if (!$connexion->query($requete)) {
            echo "Erreur lors de l'insertion du produit '$reference': " . $connexion->error . "<br>";
        }
    }
}

// Fonction pour insérer les données des clients dans la base de données
function insererClients($connexion, $utilisateurs) {
    foreach ($utilisateurs as $utilisateur) {
        $prenom = $connexion->real_escape_string($utilisateu['prenom']);
        $nom = $connexion->real_escape_string($utilisateu['nom']);
        $login = $connexion->real_escape_string($utilisateu['login']);
        $email = $connexion->real_escape_string($utilisateu['email']);
        $mot_de_passe = $connexion->real_escape_string($utilisateu['mot_de_passe']);
        $date_naissance = $connexion->real_escape_string($utilisateu['date_naissance']);
        $adresse = $connexion->real_escape_string($utilisateu['adresse']);

        $requete = "INSERT INTO clients (prenom, nom, login, email, mot_de_passe, date_naissance, adresse) VALUES ('$prenom', '$nom', '$login','$email','$mot_de_passe', '$date_naissance','$adresse')";
        if (!$connexion->query($requete)) {
            echo "Erreur lors de l'insertion du client '$nom': " . $connexion->error . "<br>";
        }
    }
}

// Récupérer les données des produits depuis $_SESSION
if(isset($_SESSION['produits'])) {
    $produits = $_SESSION['produits']; 

    insererProduits($connexion, $produits);
} else {
    echo "Erreur: aucune donnée de produits trouvée dans la session.";
}


// Récupérer les données des clients depuis $_SESSION
if(isset($_SESSION['utilisateus'])) {
    $utilisateus = $_SESSION['utilisateus']; 

    insererClients($connexion, $utilisateus);
} else {
    echo "Erreur: aucune donnée de clients trouvée dans la session.";
}


$connexion->close();
?>
