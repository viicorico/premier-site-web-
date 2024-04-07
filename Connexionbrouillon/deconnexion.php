<?php
// Démarre la session
session_start();

// Vérifie si l'utilisateur est connecté
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
    // Marque l'utilisateur comme déconnecté en définissant 'logged_in' à false
    $_SESSION['logged_in'] = false;
    
    // Détruit toutes les données de la session
    session_destroy();
    
    // Redirige l'utilisateur vers la page d'accueil
    header('Location: index.php');
    exit(); // Assure que le code suivant n'est pas exécuté une fois la redirection effectuée
} else {
    // Si l'utilisateur n'est pas connecté, redirige-le vers la page de connexion
    header('Location: connexion.php');
    exit();
}
?>
