<?php
session_start();
include 'php/varSession.inc.php';
?>
<!DOCTYPE HTML>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Guitare électrique</title>
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>
  <?php include 'php/navfixe.php'; ?>
  <?php include 'php/menu_gauche.php'; ?>
  <header>
    <h1 class="electrique-titre">Catalogue de Guitares Électriques</h1>
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

        <?php foreach ($_SESSION['categories']['Electrique'] as $index => $produit): ?>
          <tr>
            <td>
              <div class="cellule_img">
                <img src="<?php echo $produit['image']; ?>" alt="<?php echo $produit['description']; ?>" onclick="openModal(this.src)" style="cursor: pointer; max-width: 100%; height: auto; max-height: 150px;">
              </div>
            </td>
            <td><?php echo $produit['reference']; ?></td>
            <td><?php echo $produit['description']; ?></td>
            <td><?php echo $produit['prix']; ?>€</td>
            <td class="stock-amount" style="display:none;"><?php echo $produit['stock']; ?></td>
            <td>
              <button onclick="changeQuantite('decrease', this, '<?php echo $index; ?>')">-</button>
              <span id="quantity-<?php echo $index; ?>" class="quantity">0</span>
              <button onclick="changeQuantite('increase', this, '<?php echo $index; ?>')">+</button>
              <button onclick="commanderProduit('<?php echo $index; ?>', '<?php echo htmlspecialchars($produit['description']); ?>')">Commander</button>
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
    function commanderProduit(index, description) {
        var quantity = document.getElementById('quantity-' + index).innerHTML;
        if (parseInt(quantity) > 0) {
            alert("Commande du produit :\n" + description + "\nQuantité : " + quantity);
            
        } else {
            alert("Veuillez sélectionner au moins une unité du produit avant de commander.");
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