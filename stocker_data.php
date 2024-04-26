<?php
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

// Données des catégories 
$categories = $_SESSION['categories']; 

// Générer et exécuter les requêtes d'insertion pour les catégories
foreach ($categories as $cat) {
    $requete = "INSERT INTO categories (nom) VALUES ('" . $connexion->real_escape_string($cat) . "')";
    if ($connexion->query($requete) === TRUE) {
        echo "Enregistrement de la catégorie '$cat' réussi.<br>";
    } else {
        echo "Erreur lors de l'enregistrement de la catégorie '$cat': " . $connexion->error . "<br>";
    }
}

// Fonction pour insérer les données des produits dans la base de données
function insererProduits($produits) {
    $connexion = connexion();
    if ($connexion) {
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
        deconnexion($connexion);
    } else {
        echo "Erreur de connexion à la base de données.";
    }
}

// Fonction pour insérer les données des clients dans la base de données
function insererClients($clients) {
    $connexion = connexion();
    if ($connexion) {
        foreach ($clients as $client) {
        $prenom = $connexion->real_escape_string($produit['prenom']);
            $nom = $connexion->real_escape_string($client['nom']);
            $login = $connexion->real_escape_string($produit['login']);
            $email = $connexion->real_escape_string($client['email']);
            $mot_de_passe = $connexion->real_escape_string($produit['mot_de_passe']);
            $date_naissance = $connexion->real_escape_string($client['date_naissance']);
            $adresse = $connexion->real_escape_string($client['adresse']);

            $requete = "INSERT INTO clients (prenom, nom, login, email, mot_de_passe, date_naissance,adresse) VALUES ('$prenom', '$nom', '$login','$email','$mot_de_passe', '$date_naissance','$adresse')";
            if (!$connexion->query($requete)) {
                echo "Erreur lors de l'insertion du client '$nom': " . $connexion->error . "<br>";
            }
        }
        deconnexion($connexion);
    } else {
        echo "Erreur de connexion à la base de données.";
    }
}

// Récupérer les données des produits depuis $_SESSION
$produits = $_SESSION['produits']; 

// Insérer les données des produits dans la base de données
insererProduits($produits);

// Récupérer les données des clients depuis $_SESSION (ou un fichier de données)
$clients = $_SESSION['clients']; 

// Insérer les données des clients dans la base de données
insererClients($clients);


// Fermer la connexion
$connexion->close();
?>

