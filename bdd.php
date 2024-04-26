<?php
// Inclure les informations de connexion
require_once 'bddData.php';

// Fonction de connexion à la base de données
function connexion() {
    global $serveur, $utilisateur, $motdepasse, $base_de_donnees;
    $connexion = new mysqli($serveur, $utilisateur, $motdepasse, $base_de_donnees);
    if ($connexion->connect_error) {
        return false; // Renvoyer faux en cas d'erreur de connexion
    }
    return $connexion; // Renvoyer l'objet de connexion si la connexion est réussie
}

// Fonction de déconnexion de la base de données
function deconnexion($connexion) {
    $connexion->close();
}

// Fonction pour récupérer les données des catégories depuis la base de données
function recupererCategories() {
    $connexion = connexion();
    if ($connexion) {
        $requete = "SELECT * FROM categories";
        $resultat = $connexion->query($requete);
        if ($resultat) {
            $categories = array();
            while ($ligne = $resultat->fetch_assoc()) {
                $categories[] = $ligne;
            }
            $resultat->free();
            deconnexion($connexion);
            return $categories;
        }
    }
    // En cas d'échec de la requête ou de connexion
    return null;
}

// Fonction pour récupérer les données des produits depuis la base de données
function recupererProduits() {
    $connexion = connexion();
    if ($connexion) {
        $requete = "SELECT * FROM produits";
        $resultat = $connexion->query($requete);
        if ($resultat) {
            $produits = array();
            while ($ligne = $resultat->fetch_assoc()) {
                $produits[] = $ligne;
            }
            $resultat->free();
            deconnexion($connexion);
            return $produits;
        }
    }
    // En cas d'échec de la requête ou de connexion
    return null;
}

// Fonction pour récupérer les données des clients depuis la base de données
function recupererClients() {
    $connexion = connexion();
    if ($connexion) {
        $requete = "SELECT * FROM clients";
        $resultat = $connexion->query($requete);
        if ($resultat) {
            $clients = array();
            while ($ligne = $resultat->fetch_assoc()) {
                $clients[] = $ligne;
            }
            $resultat->free();
            deconnexion($connexion);
            return $clients;
        }
    }
    // En cas d'échec de la requête ou de connexion
    return null;
}
?>

