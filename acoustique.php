<?php
session_start();

// Inclure le fichier de configuration pour la session
include 'php/varSession.inc.php';

// Fonction pour ajouter un produit au panier d'un utilisateur
function ajouterAuPanier($utilisateur, $index, $reference, $description, $quantite, $image) {
    // Vérifier si le fichier panier.json existe
    $fichier_panier = 'panier.json';
    if (file_exists($fichier_panier)) {
        // Lire le contenu du fichier JSON et le décoder en tableau associatif
        $contenu = file_get_contents($fichier_panier);
        $panier = json_decode($contenu, true);
        
        // Vérifier si l'utilisateur a déjà un panier dans le fichier JSON
        if (!isset($panier[$utilisateur])) {
            $panier[$utilisateur] = [];
        }
        
        // Ajouter le produit au panier de l'utilisateur
        $panier[$utilisateur][] = [
            'index' => $index,
            'reference' => $reference, // Ajout de la référence
            'description' => $description,
            'quantite' => $quantite,
            'image' => $image
        ];
        
        // Encoder le tableau associatif en format JSON
        $nouveau_contenu = json_encode($panier, JSON_PRETTY_PRINT);
        
        // Écrire le contenu dans le fichier panier.json
        file_put_contents($fichier_panier, $nouveau_contenu);
        
        // Mettre à jour le stock
        mettreAJourStock($reference, $quantite);
    }
}

// Mettre à jour le stock après la commande
function mettreAJourStock($reference, $quantite) {
    // Spécifier le chemin complet vers le fichier categorie.json
    $fichier_categories = 'json/categorie.json';

    if (file_exists($fichier_categories)) {
        // Lire le contenu du fichier JSON et le décoder en tableau associatif
        $contenu = file_get_contents($fichier_categories);
        $categories = json_decode($contenu, true);

        // Parcourir chaque catégorie pour trouver le produit correspondant
        foreach ($categories as &$categorie) {
            foreach ($categorie as &$produit) {
                if ($produit['reference'] === $reference) {
                    // Mettre à jour le stock du produit
                    $produit['stock'] -= $quantite;
                    break; // Sortir de la boucle une fois que le produit est trouvé
                }
            }
        }

        // Encoder le tableau associatif en format JSON
        $nouveau_contenu = json_encode($categories, JSON_PRETTY_PRINT);

        // Écrire le contenu dans le fichier categorie.json
        file_put_contents($fichier_categories, $nouveau_contenu);
    }
}

// Vérifier si le formulaire pour ajouter au panier a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['commander'])) {
    // Récupérer les données du produit
    $index = $_POST['index'];
    $reference = $_POST['reference']; // Récupération de la référence
    $description = $_POST['description'];
    $quantite = $_POST['quantite'];
    $image = $_POST['image'];

    // Appeler la fonction pour ajouter le produit au panier de l'utilisateur connecté
    if (isset($_SESSION['login'])) {
        ajouterAuPanier($_SESSION['login'], $index, $reference, $description, $quantite, $image);
    }
}
?>

<!DOCTYPE HTML>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Guitare Acoustique</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php include 'php/navfixe.php'; ?>
    <?php include 'php/menu_gauche.php'; ?>
    <header>
        <h1 class="acoustique-titre">Catalogue de Guitares Acoustiques</h1>
    </header>

    <main>
        <section class="page_electrique">
            <table>
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Référence</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Stock</th>
                        <th>Commande</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['categories']['Acoustique'] as $index => $produit): ?>
                        <tr>
                            <td>
                                <div class="cellule_img">
                                    <img src="<?php echo $produit['image']; ?>" alt="<?php echo $produit['description']; ?>" onclick="openModal(this.src)" style="cursor: pointer; max-width: 100%; height: auto; max-height: 150px;">
                                </div>
                            </td>
                            <td><?php echo $produit['reference']; ?></td>
                            <td><?php echo $produit['description']; ?></td>
                            <td><?php echo $produit['prix']; ?>€</td>
                            <td><?php echo $produit['stock']; ?></td> <!-- Affichage du stock -->
                            <td>
                                <button onclick="changeQuantite('decrease', this, '<?php echo $index; ?>')">-</button>
                                <span id="quantity-<?php echo $index; ?>" class="quantity">0</span>
                                <button onclick="changeQuantite('increase', this, '<?php echo $index; ?>')">+</button>
                                <button onclick="commanderProduit('<?php echo $index; ?>', '<?php echo $produit['reference']; ?>', '<?php echo htmlspecialchars($produit['description']); ?>', '<?php echo $produit['image']; ?>')">Commander</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <button onclick="toggleStockVisibility()">Afficher/Cacher le Stock</button>
            <div id="modal" style="display:none;">
                <span onclick="closeModal()" style="cursor:pointer;">Fermer</span>
                <img id="modal-image" style="max-width: 500px;">
            </div>
        </section>
    </main>

    <script src="./js/quantite_stock_gestion.js"></script>
    <script>
        function commanderProduit(index, reference, description, image) {
            var quantity = document.getElementById('quantity-' + index).innerHTML;
            if (parseInt(quantity) > 0) {
                // Envoie de la commande au serveur
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            alert("Produit ajouté au panier : " + reference + "\nQuantité : " + quantity);
                            // Actualiser la page pour mettre à jour le stock affiché
                            location.reload();
                        } else {
                            alert("Une erreur s'est produite lors de l'ajout au panier.");
                        }
                    }
                };
                xhr.open('POST', 'acoustique.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.send('commander=true&index=' + index + '&reference=' + encodeURIComponent(reference) + '&description=' + encodeURIComponent(description) + '&quantite=' + quantity + '&image=' + encodeURIComponent(image));
            } else {
                alert("Veuillez sélectionner au moins une unité du produit avant de commander.");
            }
        }

        function changeQuantite(action, button, index) {
            var quantityElement = document.getElementById('quantity-' + index);
            var currentQuantity = parseInt(quantityElement.textContent);

            if (action === 'increase') {
                quantityElement.textContent = currentQuantity + 1;
            } else if (action === 'decrease' && currentQuantity > 0) {
                quantityElement.textContent = currentQuantity - 1;
            }
        }
    </script>
</body>
<!-- Pied de page -->
<footer>
    <?php include './php/pied_page.php'; ?>
  </footer>
  <!-- Fin du pied de page -->
</html>