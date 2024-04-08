<!DOCTYPE HTML>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Amplificateur</title>
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>
  <?php include 'php/navfixe.php'; ?>
  <?php include 'php/menu_gauche.php'; ?>
  <header>
    <h1 class="electrique-titre">Catalogue d'Amplis</h1>
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
              <img src="https://guitarmaniac.com/22716-large_default/fender-tone-master-deluxe-reverb.jpg" alt="Ampli modele 1" onclick="openModal(this.src)" style="cursor: pointer; max-width: 150px;">
            </div>
            </td>
            <td>a01</td>
            <td> FENDER TONE MASTER DELUXE REVERB </td>
            
            <td>1 035,00 €</td>
            <td class="stock-amount" style="display:none;">15</td>
            <td>
              <button onclick="changeQuantite('decrease', this, 'a01')">-</button>
              <span id="quantity-a01" class="quantity">0</span>
              <button onclick="changeQuantite('increase', this, 'a01')">+</button>
            </td>
          </tr>
          <tr>
          <tr>
            <td >
            <div class="cellule_img">
              <img src="https://guitarmaniac.com/19545-large_default/blackstar-ht-5r-mkii-.jpg" alt="Ampli modele 2" onclick="openModal(this.src)" style="cursor: pointer; max-width: 150px;">
            </div>
            </td>
            <td>a02</td>
            <td> BLACKSTAR HT-5R MKII </td>
            <td>1 391,13€</td>
            <td class="stock-amount" style="display:none;">15</td>
            <td>
              <button onclick="changeQuantite('decrease', this, 'a02')">-</button>
              <span id="quantity-a02" class="quantity">0</span>
              <button onclick="changeQuantite('increase', this, 'a02')">+</button>
            </td>
          </tr>
          <tr>
          <tr>
            <td >
            <div class="cellule_img">
              <img src="https://guitarmaniac.com/9841-large_default/boss-katana-50-mkii.jpg" alt="Ampli modele 3" onclick="openModal(this.src)" style="cursor: pointer; max-width: 150px;">
            </div>
            </td>
            <td>a03</td>
            <td>BOSS KATANA 50 MKII</td>
            <td>259,00 €</td>
            <td class="stock-amount" style="display:none;">15</td>
            <td>
              <button onclick="changeQuantite('decrease', this, 'a03')">-</button>
              <span id="quantity-a03" class="quantity">0</span>
              <button onclick="changeQuantite('increase', this, 'a03')">+</button>
            </td>
          </tr>
          <tr>
          <tr>
            <td >
            <div class="cellule_img">
              <img src="https://guitarmaniac.com/25862-large_default/fender-blues-junior-iv-british-racing-green-magasin-de-musique-nice-monaco.jpg" alt="Ampli modele 4" onclick="openModal(this.src)" style="cursor: pointer; max-width: 150px;">
            </div>
            </td>
            <td>a04</td>
            <td>FENDER BLUES JUNIOR IV BRITISH RACING GREEN</td>
            <td>779,00 €</td>
            <td class="stock-amount" style="display:none;">15</td>
            <td>
              <button onclick="changeQuantite('decrease', this, 'a04')">-</button>
              <span id="quantity-a04" class="quantity">0</span>
              <button onclick="changeQuantite('increase', this, 'a04')">+</button>
            </td>
          </tr>
          <tr> <tr>
            <td >
            <div class="cellule_img">
               <img src="https://guitarmaniac.com/26866-large_default/blackstar-debut-10e.jpg" alt="Ampli modele 5" onclick="openModal(this.src)" style="cursor: pointer; max-width: 150px;">
            </div>
            </td>
            <td>a05</td>
            <td>BLACKSTAR DEBUT 10E</td>
            <td>79,00 €</td>
            <td class="stock-amount" style="display:none;">15</td>
            <td>
              <button onclick="changeQuantite('decrease', this, 'a05')">-</button>
              <span id="quantity-a05" class="quantity">0</span>
              <button onclick="changeQuantite('increase', this, 'a05')">+</button>
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
