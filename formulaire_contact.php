<!DOCTYPE HTML>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Formulaire de Contact</title>
    <link rel="stylesheet" href="css/style_formulaire.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet"/>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <?php
    // Définition des variables et initialisation à vide
    $prenomErr = $emailErr = $telephoneErr = $genreErr = $metierErr = $date_naissanceErr = $messageErr = "";
    $prenom = $email = $telephone = $genre = $metier = $date_naissance = $message = "";

    // Vérification et nettoyage des données du formulaire lors de la soumission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["prenom"])) {
            $prenomErr = "Le prénom est requis";
        } else {
            $prenom = clean_input($_POST["prenom"]);
        }

        if (empty($_POST["email"])) {
            $emailErr = "L'email est requis";
        } else {
            $email = clean_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Format d'email invalide";
            }
        }

        if (empty($_POST["telephone"])) {
            $telephoneErr = "Le numéro de téléphone est requis";
        } else {
            $telephone = clean_input($_POST["telephone"]);
            // Vérification du format du numéro de téléphone français
            if (!preg_match("/^(0|\+33)[1-9]([-. ]?[0-9]{2}){4}$/", $telephone)) {
                $telephoneErr = "Format de numéro de téléphone invalide";
            }
        }

        // Autres validations à ajouter selon vos besoins

        // Si toutes les données sont valides, affichage du message de confirmation
        if ($prenomErr == "" && $emailErr == "" && $telephoneErr == "" /* && autres vérifications */) {
            echo "<div class='confirmation' style='color: green; margin-bottom: 10px;'>
                Le message a été envoyé avec succès.
            </div>";
        } else {
            echo "<div class='error'>Une erreur s'est produite lors du traitement du formulaire.</div>";
        }
    }

    // Fonction pour nettoyer les données du formulaire
    function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <form id="contactForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h1>Contactez-nous</h1>
        <div class="separation"></div>
        <div class="corps-formulaire">
            <div class="gauche">
                <div class="groupe">
                    <label>Votre Prénom</label>
                    <input type="text" id="prenom" name="prenom" value="<?php echo isset($prenom) ? $prenom : ''; ?>" />
                    <i class="fas fa-user"></i>
                </div>
                <span class="error"><?php echo $prenomErr; ?></span>

                <div class="groupe">
                    <label>Votre adresse e-mail</label>
                    <input type="text" id="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>" />
                    <i class="fas fa-envelope"></i>
                </div>
                <span class="error"><?php echo $emailErr; ?></span>

                <div class="groupe">
                    <label>Votre téléphone</label>
                    <input type="text" id="telephone" name="telephone" value="<?php echo isset($telephone) ? $telephone : ''; ?>" />
                    <i class="fas fa-mobile"></i>
                </div>
                <span class="error"><?php echo $telephoneErr; ?></span>

                <div class="groupe1">
                    <label>Genre :</label><br>
                    <input type="radio" id="genre_homme" name="genre" value="Homme">
                    <label for="genre_homme">Homme</label><br>
                    <input type="radio" id="genre_femme" name="genre" value="Femme">
                    <label for="genre_femme">Femme</label><br>
                    <span class="error"><?php echo $genreErr; ?></span>
                </div>

                <div class="groupe1">
                    <label for="metier">Métier :</label>
                    <select id="metier" name="metier" required>
                        <option value="">Choisir...</option>
                        <option value="Etudiant">Étudiant</option>
                        <option value="Professeur">Professeur</option>
                        <option value="Ingénieur">Ingénieur</option>
                        <option value="Autre">Autre</option>
                    </select>
                    <span class="error"><?php echo $metierErr; ?></span>
                </div>

                <div class="groupe1">
                    <label for="date_naissance">Date de Naissance :</label>
                    <input type="date" id="date_naissance" name="date_naissance" required>
                    <span class="error"><?php echo $date_naissanceErr; ?></span>
                </div>
            </div>

            <div class="droite">
                <div class="groupe">
                    <label>Message</label>
                    <textarea id="message" name="message" placeholder="Saisissez ici..."><?php echo isset($message) ? $message : ''; ?></textarea>
                    <span class="error"><?php echo $messageErr; ?></span>
                </div>
            </div>

            <div class="pied-formulaire" align="center">
                <button type="submit">Envoyer le message</button>
            </div>
        </div>
    </form>
</body>
</html>
