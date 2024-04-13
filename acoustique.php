<?php
session_start();
include 'php/varSession.inc.php';
?>
<!DOCTYPE HTML>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Guitare acoustique</title>
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>
  <?php include 'php/navfixe.php'; ?>
  <?php include 'php/menu_gauche.php'; ?>
  <header>
    <h1 class="electrique-titre">Catalogue de Guitares Acoustiques</h1>
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
          <tr>
            <td >
            <div class="cellule_img">
              <img src="https://guitarmaniac.com/24327-large_default/takamine-gd93cenat.jpg" alt="Guitare Acoustique Modèle 1" onclick="openModal(this.src)" style="cursor: pointer; max-width: 150px;">
            </div>
            </td>
            <td>ga01</td>
            <td>TAKAMINE CENAT</td>
            <td>679,00€</td>
            <td class="stock-amount" style="display:none;">15</td>
            <td>
              <button onclick="changeQuantity('decrease', this, 'ga01')">-</button>
              <span id="quantity-ga01" class="quantity">0</span>
              <button onclick="changeQuantity('increase', this, 'ga01')">+</button>
            </td>
          </tr>
          <tr>
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
              <button onclick="changeQuantity('decrease', this, 'ga02')">-</button>
              <span id="quantity-ga02" class="quantity">0</span>
              <button onclick="changeQuantity('increase', this, 'ga02')">+</button>
            </td>
          </tr>
          <tr>
          <tr>
            <td >
            <div class="cellule_img">
              <img src="https://guitarmaniac.com/28229-home_default/lag-t70ace-bls-black-satin.jpg" alt="Guitare Acoustique Modèle 3" onclick="openModal(this.src)" style="cursor: pointer; max-width: 150px;">
            </div>
            </td>
            <td>ga03</td>
            <td>LÂG BLACK SATIN</td>
            <td>279,00 €</td>
            <td class="stock-amount" style="display:none;">15</td>
            <td>
              <button onclick="changeQuantity('decrease', this, 'ga03')">-</button>
              <span id="quantity-ga03" class="quantity">0</span>
              <button onclick="changeQuantity('increase', this, 'ga03')">+</button>
            </td>
          </tr>
          <tr>
          <tr>
            <td >
            <div class="cellule_img">
              <img src="https://guitarmaniac.com/27467-home_default/fender-highway-series-parlor-rw-natural-housse.jpg" alt="Guitare Acoustique Modèle 4" onclick="openModal(this.src)" style="cursor: pointer; max-width: 150px;">
            </div>
            </td>
            <td>ga04</td>
            <td>FENDER HIGHWAY SERIES </td>
            <td>1 035,00 €</td>
            <td class="stock-amount" style="display:none;">15</td>
            <td>
              <button onclick="changeQuantity('decrease', this, 'ga04')">-</button>
              <span id="quantity-ga04" class="quantity">0</span>
              <button onclick="changeQuantity('increase', this, 'ga04')">+</button>
            </td>
          </tr>
          <tr> <tr>
            <td >
            <div class="cellule_img">
              <img src="https://guitarmaniac.com/27178-home_default/fender-newporter-player-wn-sunburst.jpg" alt="Guitare Acoustique Modèle 5" onclick="openModal(this.src)" style="cursor: pointer; max-width: 150px;">
            </div>
            </td>
            <td>ga05</td>
            <td>FENDER NEWPORTER PLAYER SUNBURST</td>
            <td>339,00 €</td>
            <td class="stock-amount" style="display:none;">15</td>
            <td>
              <button onclick="changeQuantity('decrease', this, 'ga05')">-</button>
              <span id="quantity-ga05" class="quantity">0</span>
              <button onclick="changeQuantity('increase', this, 'ga05')">+</button>
            </td>
          </tr>
          
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
            // Ici, vous pouvez implémenter la logique de commande, comme l'envoi de la commande au serveur
        } else {
            alert("Veuillez sélectionner au moins une unité du produit avant de commander.");
        }
    }
  </script>
</body>
</html>
