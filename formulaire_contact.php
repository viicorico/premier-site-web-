<!DOCTYPE HTML>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Formulaire de Contact en HTML & CSS</title>
    <link rel="stylesheet" href="style_formulaire.css" />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <form>
      <h1><i class="fas fa-envelope"></i> Contactez-nous</h1>
      <div class="separation"></div>
      <div class="corps-formulaire">
        <div class="gauche">
          <div class="groupe">
            <label><i class="fas fa-user"></i> Votre Prénom</label>
            <input type="text" autocomplete="off" />
          </div>
          <div class="groupe">
            <label><i class="fas fa-envelope"></i> Votre adresse e-mail</label>
            <input type="text" autocomplete="off" />
          </div>
          <div class="groupe">
            <label><i class="fas fa-mobile"></i> Votre téléphone</label>
            <input type="text" autocomplete="off" />
          </div>
          <label><i class="fas fa-venus-mars icon"></i> Genre :</label><br>
          <input type="radio" id="genre_homme" name="genre" value="Homme">
          <label for="genre_homme">Homme</label><br>
          <input type="radio" id="genre_femme" name="genre" value="Femme">
          <label for="genre_femme">Femme</label><br><br>
          
          <label for="metier"><i class="fas fa-briefcase icon"></i> Métier :</label>
          <select id="metier" name="metier" required>
              <option value="">Choisir...</option>
              <option value="Etudiant">Étudiant</option>
              <option value="Professeur">Professeur</option>
              <option value="Ingénieur">Ingénieur</option>
              <option value="Autre">Autre</option>
            </select><br><br>
    
            <label for="date_naissance"><i class="fas fa-calendar-alt icon"></i> Date de Naissance :</label>
            <input type="date" id="date_naissance" name="date_naissance" required><br><br>
    
            <label for="sujet"><i class="fas fa-heading icon"></i> Sujet :</label>
            <input type="text" id="sujet" name="sujet" required><br><br>
        </div>

        <div class="droite">
          <div class="groupe">
            <label><i class="fas fa-comment icon"></i> Message</label>
            <textarea placeholder="Saisissez ici..."></textarea>
          </div>
        </div>
      </div>

      <div class="pied-formulaire" align="center">
        <button>Envoyer le message</button>
      </div>
    </form>
  </body>
</html>