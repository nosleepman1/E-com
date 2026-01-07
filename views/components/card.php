<?php
function renderProductCard($product) {
    
    $name = htmlspecialchars($product['libelle']);
    $description = htmlspecialchars($product['description']);
    $price = number_format( $product['prix'], 0, ',', ' ');
    $quantity = $product['quantite'];
    $category = htmlspecialchars($product['libelle'] ?? 'Non catégorisé');
    $image = $product['image'] ?? 'https://via.placeholder.com/400x300/FF6B35/ffffff?text=Produit';
    
    $stockStatus = $quantity > 0 ? 'En stock' : 'Rupture';
    $stockClass = $quantity > 0 ? 'success' : 'danger';
    $stockIcon = $quantity > 0 ? '✓' : '✗';
    
    return <<<HTML
    <div class="col-md-4 col-lg-3 mb-4">
        <div class="card product-card h-100 shadow-sm border-0">
            <div class="position-relative overflow-hidden">
                <img src="{$image}" class="card-img-top product-image" alt="{$name}">
                <span class="badge bg-{$stockClass} position-absolute top-0 end-0 m-3 px-3 py-2">
                    {$stockIcon} {$stockStatus}
                </span>
                <div class="category-badge position-absolute bottom-0 start-0 m-3">
                    <span class="badge bg-white text-dark px-3 py-2 shadow-sm">
                        📦 {$category}
                    </span>
                </div>
            </div>
            
            <div class="card-body d-flex flex-column">
                <h5 class="card-title text-dark fw-bold mb-3">{$name}</h5>
                
                <p class="card-text text-muted flex-grow-1 small lh-base">
                    {$description}
                </p>
                
                <div class="mt-3 pt-3 border-top">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="price-section">
                            <span class="text-muted small d-block">Prix</span>
                            <span class="h4 text-primary fw-bold mb-0">{$price} <small class="text-muted fs-6">FCFA</small></span>
                        </div>
                        <div class="quantity-section text-end">
                            <span class="text-muted small d-block">Quantité</span>
                            <span class="h5 text-dark fw-semibold mb-0">{$quantity}</span>
                        </div>
                    </div>
                    
                    <button class="btn btn-primary w-100 rounded-pill py-2 fw-semibold">
                        🛒 Ajouter au panier
                    </button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .product-card {
            transition: all 0.3s ease;
            border-radius: 20px;
            overflow: hidden;
        }
        
        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15) !important;
        }
        
        .product-image {
            height: 250px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .product-card:hover .product-image {
            transform: scale(1.1);
        }
        
        .card-title {
            font-size: 1.1rem;
            min-height: 50px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .card-text {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            min-height: 60px;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
            transform: scale(1.02);
        }
        
        .category-badge .badge {
            backdrop-filter: blur(10px);
            border-radius: 12px;
            font-weight: 600;
        }
    </style>
    HTML;
}
?>