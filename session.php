<?php
require_once 'bdd.php';

// Récupérer les données des catégories depuis la base de données
$categories = recupererCategories();
if ($categories) {
    $_SESSION['categories'] = $categories;
} else {
    // Gérer l'erreur si la récupération des catégories a échoué
    echo "Erreur lors de la récupération des catégories depuis la base de données.";
}

// Récupérer les données des produits depuis la base de données
$produits = recupererProduits();
if ($produits) {
    $_SESSION['produits'] = $produits;
} else {
    // Gérer l'erreur si la récupération des produits a échoué
    echo "Erreur lors de la récupération des produits depuis la base de données.";
}

// Récupérer les données des clients depuis la base de données
$clients = recupererClients();
if ($clients) {
    $_SESSION['clients'] = $clients;
} else {
    // Gérer l'erreur si la récupération des clients a échoué
    echo "Erreur lors de la récupération des clients depuis la base de données.";
}
?>

