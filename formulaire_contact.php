<!DOCTYPE HTML>
<html lang="fr"></html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Formulaire de Contact</title>
    <link rel="stylesheet" href="css\style_formulaire.css" />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet"/>
  </head>
  <body>
    <form>
      <h1>Contactez-nous</h1>
      <div class="separation"></div>
      <div class="corps-formulaire">
        <div class="gauche">
          <div class="groupe">
            <label>Votre Prénom</label>
            <input type="text" autocomplete="off" />
            <i class="fas fa-user"></i>
          </div>
          <div class="groupe">
            <label>Votre adresse e-mail</label>
            <input type="text" autocomplete="off" />
            <i class="fas fa-envelope"></i>
          </div>
          <div class="groupe">
            <label>Votre téléphone</label>
            <input type="text" autocomplete="off" />
            <i class="fas fa-mobile"></i>
          </div>
          <div class="groupe1">
            <label><i class="fas fa-venus-mars icon"></i>Genre :</label><br>
           <input type="radio" id="genre_homme" name="genre" value="Homme">
            <label for="genre_homme">Homme</label><br>
            <input type="radio" id="genre_femme" name="genre" value="Femme">
            <label for="genre_femme">Femme</label><br><br>

            <label for="metier"><i class="fas fa-briefcase icon"></i>Métier :</label>
        <select id="metier" name="metier" required>
            <option value="">Choisir...</option>
            <option value="Etudiant">Étudiant</option>
            <option value="Professeur">Professeur</option>
            <option value="Ingénieur">Ingénieur</option>
            <option value="Autre">Autre</option>
        </select><br><br>

        <label for="date_naissance"><i class="fas fa-calendar-alt icon"></i>Date de Naissance :</label>
        <input type="date" id="date_naissance" name="date_naissance" required><br><br>
        </div>
        

        <div class="droite">
          <div class="groupe">
            <label>Message</label>
            <textarea placeholder="Saisissez ici..."></textarea>
          </div>
        </div>
      </div>

      <div class="pied-formulaire" align="center">
        <button>Envoyer le message</button>
      </div>
    </form>
  </body>
  
  <script>
        document.getElementById("contactForm").addEventListener("submit", function(event) {
            var isValid = true;

            // Vérification du nom et prénom (au moins 2 caractères)
            var nomInput = document.getElementById("nom");
            var prenomInput = document.getElementById("prenom");
            if (nomInput.value.length < 2 || prenomInput.value.length < 2) {
                nomInput.classList.add("error");
                prenomInput.classList.add("error");
                isValid = false;
            } else {
                nomInput.classList.remove("error");
                prenomInput.classList.remove("error");
            }

            // Vérification de l'email (format valide)
            var emailInput = document.getElementById("email");
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(emailInput.value)) {
                emailInput.classList.add("error");
                isValid = false;
            } else {
                emailInput.classList.remove("error");
            }

            // Vérification du métier (sélectionné)
            var metierInput = document.getElementById("metier");
            if (metierInput.value === "") {
                metierInput.classList.add("error");
                isValid = false;
            } else {
                metierInput.classList.remove("error");
            }

            if (!isValid) {
                event.preventDefault(); // Empêche l'envoi du formulaire si des erreurs sont présentes
            }
        });
    </script>
</body>
</html>
</html>