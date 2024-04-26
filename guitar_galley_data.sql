-- Utiliser la base de données
USE guitar_galley_data;

-- Insérer des catégories
INSERT INTO categories (nom) VALUES
('Électrique'),
('Acoustique'),
('Amplificateur');

-- Insérer des produits de test
INSERT INTO produits (reference, description, prix, stock, image, categorie_id) VALUES
('ge01', 'FENDER JIMI HENDRIX STRATOCASTER', 1158.00, 15,'https://guitarmaniac.com/18339-large_default/fender-jimi-hendrix-stratocaster-mn-olympic-white.jpg',1);

-- Insérer des clients de test
INSERT INTO clients (prenom, nom, login, email, mot_de_passe, date_naissance, adresse) VALUES
('luz','busquet',001,'a@gmail.com','a','2024-04-25','a'); 
