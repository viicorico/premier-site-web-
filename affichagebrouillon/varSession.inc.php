<?php
// Vérifiez si la session n'est pas déjà active avant d'appeler session_start()
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Vérifiez si $_SESSION['categories'] est déjà défini
if (!isset($_SESSION['categories'])) {
    // Tableau des catégories avec les produits et leurs informations
    $_SESSION['categories'] = array(
        'Electrique' => array(
            array(
                'reference' => 'ge01',
                'description' => 'FENDER JIMI HENDRIX STRATOCASTER',
                'prix' => 1158.00,
                'stock' => 15,
                'image' => 'https://guitarmaniac.com/13652-large_default/squier-mini-jazzmaster-hh-mn-daphne-blue.jpg'
            ),
            array(
                'reference' => 'ge02',
                'description' => 'FENDER JOE STRUMMER TELECASTER',
                'prix' => 1391.13,
                'stock' => 15,
                'image' => 'https://guitarmaniac.com/23127-large_default/fender-joe-strummer-telecaster-rw-black-etui.jpg'
            ),
            array(
                'reference' => 'ga01',
                'description' => 'Amplificateur Fender',
                'prix' => 599.99,
                'stock' => 10,
                'image' => 'https://guitarmaniac.com/18339-large_default/fender-jimi-hendrix-stratocaster-mn-olympic-white.jpg'
            ),
            // Ajoutez d'autres produits électriques ici si nécessaire
        ),
        'Acoustique' => array(
            array(
                'reference' => 'ga01',
                'description' => 'TAKAMINE CENAT',
                'prix' => 679.00,
                'stock' => 15,
                'image' => 'https://guitarmaniac.com/24327-large_default/takamine-gd93cenat.jpg'
            ),
            array(
                'reference' => 'ga02',
                'description' => 'YAMAHA ORIENTAL BLUE BURST',
                'prix' => 349.00,
                'stock' => 15,
                'image' => 'https://guitarmaniac.com/16758-large_default/yamaha-apx600-obb-oriental-blue-burst.jpg'
            ),
            array(
                'reference' => 'ga03',
                'description' => 'LÂG BLACK SATIN',
                'prix' => 279.00,
                'stock' => 15,
                'image' => 'https://guitarmaniac.com/28229-home_default/lag-t70ace-bls-black-satin.jpg'
            ),
            array(
                'reference' => 'ga04',
                'description' => 'FENDER HIGHWAY SERIES',
                'prix' => 1035.00,
                'stock' => 15,
                'image' => 'https://guitarmaniac.com/27467-home_default/fender-highway-series-parlor-rw-natural-housse.jpg'
            ),
            array(
                'reference' => 'ga05',
                'description' => 'FENDER NEWPORTER PLAYER SUNBURST',
                'prix' => 339.00,
                'stock' => 15,
                'image' => 'https://guitarmaniac.com/27178-home_default/fender-newporter-player-wn-sunburst.jpg'
            ),

            // Ajoutez d'autres produits acoustiques ici si nécessaire
        ),
        'Amplificateur' => array(
            array(
                'reference' => 'ge03',
                'description' => 'Amplificateur Fender',
                'prix' => 599.99,
                'stock' => 10,
                'image' => 'https://guitarmaniac.com/18339-large_default/fender-jimi-hendrix-stratocaster-mn-olympic-white.jpg'
            ),
            array(
                'reference' => 'ge04',
                'description' => 'Amplificateur Marshall',
                'prix' => 799.99,
                'stock' => 8,
                'image' => 'https://example.com/marshall_amplifier.jpg'
            ),
            // Ajoutez d'autres produits d'amplificateur ici si nécessaire
        ),
    );
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
