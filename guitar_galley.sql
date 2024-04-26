-- Supprimer la base de données si elle existe déjà
DROP DATABASE IF EXISTS guitar_galley_data;

-- Créer la base de données
CREATE DATABASE guitar_galley_data;

-- Utiliser la base de données
USE guitar_galley_data;

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL
);

-- Table des produits
CREATE TABLE produits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reference VARCHAR(100) NOT NULL,
    description TEXT,
    prix DECIMAL(10,2) NOT NULL,
    stock int,
    image VARCHAR(500),
    categorie_id int,
    FOREIGN KEY (categorie_id) REFERENCES categories(id)
);

-- Table des clients
CREATE TABLE clients (
    prenom VARCHAR(50) NOT NULL,
    nom VARCHAR(50) NOT NULL,
    login int PRIMARY KEY,
    email VARCHAR(100) NOT NULL,
    mot_de_passe VARCHAR(255),
    date_naissance VARCHAR(20),
    adresse VARCHAR(100)
);
