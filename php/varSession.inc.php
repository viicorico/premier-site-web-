<?php
// afin de vérifier si la session n'est pas déjà active 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$json_file_path = './json/categorie.json';

// Charger les données JSON depuis le fichier
$json_data = file_get_contents($json_file_path);

// Convertir les données JSON en tableau PHP
$categories_json = json_decode($json_data, true);

// Vérifiez si $_SESSION['categories'] est déjà défini
if (!isset($_SESSION['categories'])) {
    // Remplacer les éléments existants de $_SESSION['categories'] par les données JSON
    $_SESSION['categories'] = $categories_json;
} else {
    // Mettre à jour les données dans $_SESSION['categories'] avec les nouvelles données JSON
    $_SESSION['categories'] = $categories_json;
}

// Fonction pour générer le menu
function genererMenu($categories) {
    echo "<ul>";
    foreach ($categories as $categorie => $sousCategories) {
        echo "<li>$categorie<ul>";
        foreach ($sousCategories as $sousCategorie) {
            // Utilisation de la référence du produit comme valeur pour le paramètre cat
            echo "<li><a href='produits.php?cat={$sousCategorie['reference']}'>{$sousCategorie['description']}</a></li>";
        }
        echo "</ul></li>";
    }
    echo "</ul>";
}
?>

