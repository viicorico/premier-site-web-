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
          <tr>
            <td >
            <div class="cellule_img">
              <img src="https://guitarmaniac.com/18339-large_default/fender-jimi-hendrix-stratocaster-mn-olympic-white.jpg" alt="Guitare Électrique Modèle 1" onclick="openModal(this.src)" style="cursor: pointer; max-width: 150px;">
            </div>
            </td>
            <td>ge01</td>
            <td>  FENDER JIMI HENDRIX STRATOCASTER </td>
            
            <td>1 158,00€</td>
            <td class="stock-amount" style="display:none;">15</td>
            <td>
              <button onclick="changeQuantite('decrease', this, 'ge01')">-</button>
              <span id="quantity-ge01" class="quantity">0</span>
              <button onclick="changeQuantite('increase', this, 'ge01')">+</button>
            </td>
          </tr>
          <tr>
          <tr>
            <td >
            <div class="cellule_img">
              <img src="https://guitarmaniac.com/23127-large_default/fender-joe-strummer-telecaster-rw-black-etui.jpg" alt="Guitare Électrique Modèle 2" onclick="openModal(this.src)" style="cursor: pointer; max-width: 150px;">
            </div>
            </td>
            <td>ge02</td>
            <td> FENDER JOE STRUMMER TELECASTER </td>
            <td>1 391,13</td>
            <td class="stock-amount" style="display:none;">15</td>
            <td>
              <button onclick="changeQuantite('decrease', this, 'ge02')">-</button>
              <span id="quantity-ge02" class="quantity">0</span>
              <button onclick="changeQuantite('increase', this, 'ge02')">+</button>
            </td>
          </tr>
          <tr>
          <tr>
            <td >
            <div class="cellule_img">
              <img src="https://guitarmaniac.com/18339-large_default/fender-jimi-hendrix-stratocaster-mn-olympic-white.jpg" alt="Guitare Électrique Modèle 1" onclick="openModal(this.src)" style="cursor: pointer; max-width: 150px;">
            </div>
            </td>
            <td>ge03</td>
            <td>Guitare Électrique Modèle 1</td>
            <td>500€</td>
            <td class="stock-amount" style="display:none;">15</td>
            <td>
              <button onclick="changeQuantite('decrease', this, 'ge03')">-</button>
              <span id="quantity-ge03" class="quantity">0</span>
              <button onclick="changeQuantite('increase', this, 'ge03')">+</button>
            </td>
          </tr>
          <tr>
          <tr>
            <td >
            <div class="cellule_img">
              <img src="https://guitarmaniac.com/18339-large_default/fender-jimi-hendrix-stratocaster-mn-olympic-white.jpg" alt="Guitare Électrique Modèle 1" onclick="openModal(this.src)" style="cursor: pointer; max-width: 150px;">
            </div>
            </td>
            <td>ge04</td>
            <td>Guitare Électrique Modèle 1</td>
            <td>500€</td>
            <td class="stock-amount" style="display:none;">15</td>
            <td>
              <button onclick="changeQuantite('decrease', this, 'ge04')">-</button>
              <span id="quantity-ge04" class="quantity">0</span>
              <button onclick="changeQuantite('increase', this, 'ge04')">+</button>
            </td>
          </tr>
          <tr> <tr>
            <td >
            <div class="cellule_img">
              <img src="https://guitarmaniac.com/18339-large_default/fender-jimi-hendrix-stratocaster-mn-olympic-white.jpg" alt="Guitare Électrique Modèle 1" onclick="openModal(this.src)" style="cursor: pointer; max-width: 150px;">
            </div>
            </td>
            <td>ge05</td>
            <td>Guitare Électrique Modèle 1</td>
            <td>500€</td>
            <td class="stock-amount" style="display:none;">15</td>
            <td>
              <button onclick="changeQuantite('decrease', this, 'ge05')">-</button>
              <span id="quantity-ge05" class="quantity">0</span>
              <button onclick="changeQuantite('increase', this, 'ge05')">+</button>
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
  <!-- Le reste de votre contenu HTML ici -->

  <script src="./js/action_catalogue.js"></script>
</body>
</html>
