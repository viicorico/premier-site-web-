<!DOCTYPE HTML>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Formulaire de Contact</title>
    <link rel="stylesheet" href="css/style_formulaire.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet"/>
</head>
<body>
    <form id="contactForm" action="send_email.php" method="post">
        <h1>Contactez-nous</h1>
        <div class="separation"></div>
        <div class="corps-formulaire">
            <!-- Vos champs de formulaire ici -->

            <div id="confirmation" style="display: none; color: green; margin-bottom: 10px;">
                Le message a été envoyé avec succès.
            </div>

            <div class="gauche">
                <!-- Champs de formulaire -->
                <div class="groupe">
                    <label>Votre Prénom</label>
                    <input type="text" name="prenom" id="prenom" autocomplete="off" />
                    <i class="fas fa-user"></i>
                </div>

                <div class="groupe">
                    <label>Votre adresse e-mail</label>
                    <input type="text" name="email" id="email" autocomplete="off" />
                    <i class="fas fa-envelope"></i>
                </div>

                <div class="groupe">
                    <label>Votre téléphone</label>
                    <input type="text" name="telephone" id="telephone" autocomplete="off" />
                    <i class="fas fa-mobile"></i>
                </div>

                <div class="groupe1">
                    <label><i class="fas fa-venus-mars icon"></i>Genre :</label><br>
                    <input type="radio" id="genre_homme" name="genre" value="Homme">
                    <label for="genre_homme">Homme</label><br>
                    <input type="radio" id="genre_femme" name="genre" value="Femme">
                    <label for="genre_femme">Femme</label><br><br>
                </div>

                <div class="groupe1">
                    <label for="metier"><i class="fas fa-briefcase icon"></i>Métier :</label>
                    <select id="metier" name="metier" required>
                        <option value="">Choisir...</option>
                        <option value="Etudiant">Étudiant</option>
                        <option value="Professeur">Professeur</option>
                        <option value="Ingénieur">Ingénieur</option>
                        <option value="Autre">Autre</option>
                    </select><br><br>
                </div>

                <div class="groupe1">
                    <label for="date_naissance"><i class="fas fa-calendar-alt icon"></i>Date de Naissance :</label>
                    <input type="date" id="date_naissance" name="date_naissance" required><br><br>
                </div>
            </div>

            <div class="droite">
                <div class="groupe">
                    <label>Message</label>
                    <textarea name="message" id="message" placeholder="Saisissez ici..." rows="5"></textarea>
                </div>
            </div>

            <div class="pied-formulaire" align="center">
                <button type="submit">Envoyer le message</button>
            </div>
        </div>
    </form>

    <script>
        // Fonction pour afficher le message de confirmation
        function afficherConfirmation() {
            var confirmationDiv = document.getElementById("confirmation");
            confirmationDiv.style.display = "block";

            // Réinitialiser les champs du formulaire après 3 secondes
            setTimeout(function() {
                document.getElementById("contactForm").reset();
                confirmationDiv.style.display = "none";
            }, 3000);
        }

        // Événement qui se déclenche lorsque le formulaire est soumis avec succès
        document.getElementById("contactForm").addEventListener("submit", function(event) {
            // Afficher le message de confirmation
            afficherConfirmation();
        });
    </script>
</body>
</html>