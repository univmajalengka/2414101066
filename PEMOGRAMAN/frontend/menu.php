<?php
// frontend/menu.php
session_start();

// Include database class - path yang benar untuk struktur folder Anda
require_once __DIR__ . '/../config/database.php';

// Create database instance and get connection
$database = new Database();
$db = $database->getConnection();

// Inisialisasi variabel
$categories = [];
$products = [];
$products_by_category = [];

if ($db) {
    try {
        // Ambil semua kategori
        $categories_stmt = $db->query("SELECT * FROM categories");
        $categories = $categories_stmt->fetchAll(PDO::FETCH_ASSOC);

        // Ambil semua produk
        $products_stmt = $db->query("
            SELECT p.*, c.name as category_name 
            FROM products p 
            LEFT JOIN categories c ON p.category_id = c.id 
            WHERE p.is_available = 1
            ORDER BY c.id, p.is_best_seller DESC, p.name
        ");
        $products = $products_stmt->fetchAll(PDO::FETCH_ASSOC);

        // Kelompokkan produk berdasarkan kategori
        foreach ($products as $product) {
            $category_id = $product['category_id'];
            if (!isset($products_by_category[$category_id])) {
                $products_by_category[$category_id] = [];
            }
            $products_by_category[$category_id][] = $product;
        }
    } catch(PDOException $e) {
        error_log("Database query error: " . $e->getMessage());
    }
}
?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menu Fiksi Cafe - Kopi, Makanan & Minuman Spesial</title>
    
    <!-- Gunakan Bootstrap dari folder css lokal -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        .hero-section {
            height: 50vh;
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('../ASET/kafe-buku-di-jakarta.jpg') no-repeat center center/cover;
        }
        
        .section-padding {
            padding: 80px 0;
        }
        
        .menu-card {
            transition: transform 0.3s;
            border: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            height: 100%;
        }
        
        .menu-card:hover {
            transform: translateY(-10px);
        }
        
        .menu-img {
            height: 200px;
            object-fit: cover;
        }
        
        .price-tag {
            font-size: 1.25rem;
            font-weight: bold;
            color: #8B4513;
        }
        
        .category-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 1;
        }
        
        .filter-btn {
            border: 2px solid #8B4513;
            color: #8B4513;
            margin: 5px;
        }
        
        .filter-btn.active, .filter-btn:hover {
            background-color: #8B4513;
            color: white;
        }
        
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
        
        .best-seller {
            border: 2px solid #ffc107;
        }
        
        .menu-category {
            scroll-margin-top: 100px;
        }
        
        .cart-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #dc3545;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .error-message {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
    </style>
</head>
<body id="page-top">
    <!-- Navbar -->
    <?php 
    $header_path = __DIR__ . '/../layout/header.html';
    if (file_exists($header_path)) {
        include($header_path);
    } else {
        // Fallback header
        echo '
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="../ASET/logo_fiksi_coffe.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                    Fiksi Cafe
                </a>
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="login.php">Login</a>
                    <a class="nav-link" href="daftar.php">Daftar</a>
                </div>
            </div>
        </nav>';
    }
    ?>

    <!-- Hero Section -->
    <section class="hero-section text-white d-flex align-items-center">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-4">Menu Fiksi Cafe</h1>
            <p class="lead mb-4">Jelajahi berbagai pilihan kopi spesial, makanan lezat, dan minuman menyegarkan</p>
        </div>
    </section>

    <!-- Error Message jika database tidak tersedia -->
    <?php if (empty($products) && empty($categories)): ?>
    <div class="container mt-4">
        <div class="error-message text-center">
            <h4><i class="fas fa-exclamation-triangle"></i> Menu Sedang Tidak Tersedia</h4>
            <p>Silakan hubungi administrator atau coba lagi nanti.</p>
        </div>
        
        <!-- Fallback menu statis -->
        <div class="row mt-4">
            <div class="col-12">
                <h3 class="text-center mb-4">Menu Sementara</h3>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card menu-card">
                    <img src="../ASET/kopi.png" class="card-img-top menu-img" alt="Espresso">
                    <div class="card-body">
                        <h5 class="card-title">Espresso Fiksi</h5>
                        <p class="card-text">Kopi espresso dengan cita rasa kuat.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price-tag">Rp 25.000</span>
                            <button class="btn btn-outline-primary btn-sm">Pesan</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card menu-card">
                    <img src="../ASET/kopi.png" class="card-img-top menu-img" alt="Latte">
                    <div class="card-body">
                        <h5 class="card-title">Latte Art</h5>
                        <p class="card-text">Latte dengan seni yang indah.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price-tag">Rp 35.000</span>
                            <button class="btn btn-outline-primary btn-sm">Pesan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>

    <!-- Filter Menu -->
    <section class="py-4 bg-light sticky-top" style="top: 76px; z-index: 1020;">
        <div class="container">
            <div class="text-center">
                <div class="btn-group flex-wrap justify-content-center" role="group">
                    <button type="button" class="btn filter-btn active" data-filter="all">Semua Menu</button>
                    <?php foreach ($categories as $category): ?>
                        <button type="button" class="btn filter-btn" data-filter="<?php echo strtolower(str_replace(' ', '-', $category['name'])); ?>">
                            <?php echo htmlspecialchars($category['name']); ?>
                        </button>
                    <?php endforeach; ?>
                    <button type="button" class="btn filter-btn" data-filter="best-seller">Best Seller</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Menu Sections -->
    <?php foreach ($categories as $category): 
        $category_slug = strtolower(str_replace(' ', '-', $category['name']));
        $category_products = $products_by_category[$category['id']] ?? [];
        
        if (empty($category_products)) continue;
    ?>
    <section id="<?php echo $category_slug; ?>" class="section-padding menu-category <?php echo $category_slug == 'snack' ? 'bg-light' : ''; ?>">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="fw-bold mb-3"><?php echo htmlspecialchars($category['name']); ?></h2>
                    <p class="lead"><?php echo htmlspecialchars($category['description']); ?></p>
                </div>
            </div>
            
            <div class="row g-4">
                <?php foreach ($category_products as $product): 
                    $categories_list = $category_slug . ($product['is_best_seller'] ? ' best-seller' : '');
                ?>
                <div class="col-md-4 col-lg-3" data-category="<?php echo $categories_list; ?>">
                    <div class="card menu-card <?php echo $product['is_best_seller'] ? 'best-seller' : ''; ?>">
                        <?php if ($product['is_best_seller']): ?>
                            <span class="badge bg-warning category-badge">Best Seller</span>
                        <?php endif; ?>
                        <img src="<?php echo htmlspecialchars($product['image_url']); ?>" 
                             class="card-img-top menu-img" alt="<?php echo htmlspecialchars($product['name']); ?>"
                             onerror="this.src='../ASET/kopi.png'">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($product['description']); ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price-tag">Rp <?php echo number_format($product['price'], 0, ',', '.'); ?></span>
                                <button class="btn btn-outline-primary btn-sm add-to-cart" 
                                        data-product-id="<?php echo $product['id']; ?>"
                                        data-product-name="<?php echo htmlspecialchars($product['name']); ?>"
                                        data-product-price="<?php echo $product['price']; ?>">
                                    <i class="fas fa-plus"></i> Tambah
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endforeach; ?>

    <!-- CTA Order -->
    <section class="section-padding bg-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="fw-bold mb-3">Ingin Menikmati Menu di Rumah?</h2>
                    <p class="lead mb-4">Pesan online sekarang dan nikmati promo spesial untuk pembelian pertama</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="orderonline.php" class="btn btn-light btn-lg px-4">Order Online Sekarang</a>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Footer -->
    <?php 
    $footer_path = __DIR__ . '/../layout/footer.html';
    if (file_exists($footer_path)) {
        include($footer_path);
    } else {
        echo '
        <footer class="bg-dark text-white py-4 mt-5">
            <div class="container text-center">
                <p>&copy; 2024 Fiksi Cafe. All rights reserved.</p>
            </div>
        </footer>';
    }
    ?>

    <!-- Gunakan Bootstrap JS dari folder lokal -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const menuItems = document.querySelectorAll('[data-category]');
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            
            // Filter Menu
            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                    
                    const filterValue = this.getAttribute('data-filter');
                    
                    menuItems.forEach(item => {
                        if (filterValue === 'all' || item.getAttribute('data-category').includes(filterValue)) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });
            
            // Add to Cart
            document.querySelectorAll('.add-to-cart').forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.getAttribute('data-product-id');
                    const productName = this.getAttribute('data-product-name');
                    const productPrice = parseFloat(this.getAttribute('data-product-price'));
                    
                    const existingItem = cart.find(item => item.id === productId);
                    
                    if (existingItem) {
                        existingItem.quantity += 1;
                    } else {
                        cart.push({
                            id: productId,
                            name: productName,
                            price: productPrice,
                            quantity: 1
                        });
                    }
                    
                    localStorage.setItem('cart', JSON.stringify(cart));
                    
                    // Show success message
                    const alertDiv = document.createElement('div');
                    alertDiv.className = 'alert alert-success alert-dismissible fade show position-fixed';
                    alertDiv.style.cssText = 'top: 100px; right: 20px; z-index: 9999; min-width: 300px;';
                    alertDiv.innerHTML = `
                        <i class="fas fa-check-circle"></i> Produk berhasil ditambahkan ke keranjang!
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    `;
                    
                    document.body.appendChild(alertDiv);
                    
                    setTimeout(() => {
                        if (alertDiv.parentNode) {
                            alertDiv.remove();
                        }
                    }, 3000);
                });
            });
        });
        
        // inisialisasi cart dari localStorage
        window.cart = JSON.parse(localStorage.getItem('cart') || '[]');

        function saveCart() {
          localStorage.setItem('cart', JSON.stringify(window.cart));
          console.log('Cart saved:', window.cart);
        }

        // menambah item ke cart (dipanggil oleh tombol)
        function addToCart(id, name, price) {
          price = Number(price) || 0;
          const existing = window.cart.find(i => i.id == id);
          if (existing) {
            existing.quantity = Number(existing.quantity || 0) + 1;
          } else {
            window.cart.push({ id: String(id), name: String(name), price: price, quantity: 1 });
          }
          saveCart();
          // notifikasi singkat
          if (typeof toastr !== 'undefined') {
            toastr.success('Produk ditambahkan ke keranjang');
          } else {
            alert('Produk ditambahkan ke keranjang');
          }
        }

        // event delegation utk tombol dengan class .add-to-cart
        document.addEventListener('click', function(e){
          const btn = e.target.closest('.add-to-cart');
          if (!btn) return;
          const id = btn.getAttribute('data-id');
          const name = btn.getAttribute('data-name');
          const price = btn.getAttribute('data-price');
          addToCart(id, name, price);
        });
    </script>
</body>
</html>