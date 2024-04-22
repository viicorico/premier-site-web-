<?php
// Démarrer la session au tout début du fichier
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE HTML> 
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Site complet moderne</title>
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>
  <!-- Barre de navigation -->
  <?php include './php/navfixe.php'; ?>
  <!-- Fin de la barre de navigation -->
  <main> 
    <section class="page" id="page">
      <?php include './php/deuxiemenav.php'; ?>
      <!-- Header -->
      <header>
          <div class="banner">
              <img src="./img/banniere3.jpg" alt="Bannière">
          </div>
      </header>
      <!-- Fin du header -->

    <?php include './php/menu_gauche.php'; ?>

    <!-- Informations -->
    
    <!-- Fin des informations -->
    </section>
  
  <!-- Pied de page -->
  <footer>
      <h5>Des questions ? Appelez le 0474-998-740</h5>
      <p class="copyright"> 2024 Your Company. All rights reserved.</p>
  </footer>
  <!-- Fin du pied de page -->

</main>
</body>
</html>