<?php
// Fonction pour générer le menu
function genererMenu($categories) {
    echo '<ul>';
    foreach ($categories as $categorie => $sousCategories) {
        echo "<li>$categorie<ul>";
        foreach ($sousCategories as $sousCategorie => $produits) {
            echo "<li><a href='produits.php?cat=$sousCategorie'>$sousCategorie</a></li>";
        }
        echo '</ul></li>';
    }
    echo '</ul>';
}
?>