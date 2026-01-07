-- Table 1 : users
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50) DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-- Table 2 : categories
CREATE TABLE categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    libelle VARCHAR(255) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-- Table 3 : products
CREATE TABLE products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    libelle VARCHAR(255) NOT NULL,
    description TEXT,
    prix DECIMAL(10, 2) NOT NULL,
    quantite INT NOT NULL DEFAULT 0,
    user_id INT NOT NULL,
    category_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);
-- Index pour améliorer les performances
CREATE INDEX idx_products_user_id ON products(user_id);
CREATE INDEX idx_products_category_id ON products(category_id);
CREATE INDEX idx_users_email ON users(email);
-- Insertion de 5 catégories par défaut pour les produits sénégalais
INSERT INTO categories (libelle, description)
VALUES (
        'Céréales et Grains',
        'Mil, riz, maïs, fonio et autres céréales locales utilisées dans la cuisine sénégalaise'
    ),
    (
        'Condiments et Épices',
        'Yet (néré), tamarin, piment, soumbala, cube Maggi et autres condiments traditionnels'
    ),
    (
        'Produits de la Mer',
        'Poissons séchés (keccax), fruits de mer, yeet (crevettes séchées) et produits halieutiques'
    ),
    (
        'Légumes et Fruits',
        'Gombo, bissap, ditakh, mangues, oranges et autres produits maraîchers locaux'
    ),
    (
        'Artisanat et Textile',
        'Bazin, wax, paniers en osier, poteries, objets décoratifs et tissus traditionnels'
    );