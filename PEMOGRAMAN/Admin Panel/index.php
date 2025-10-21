<?php
// Hapus session_start dan pengecekan login
require_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();

// Ambil statistik
$users_count = $db->query("SELECT COUNT(*) FROM users")->fetchColumn();
$products_count = $db->query("SELECT COUNT(*) FROM products")->fetchColumn();
$categories_count = $db->query("SELECT COUNT(*) FROM categories")->fetchColumn();
$best_sellers_count = $db->query("SELECT COUNT(*) FROM products WHERE is_best_seller = 1")->fetchColumn();

// Ambil produk terbaru
$new_products = $db->query("SELECT * FROM products ORDER BY created_at DESC LIMIT 5")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Fiksi Cafe</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .sidebar {
            background: #2c3e50;
            color: white;
            height: 100vh;
            position: fixed;
        }
        .sidebar .nav-link {
            color: #bdc3c7;
            padding: 15px 20px;
            border-left: 4px solid transparent;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            color: white;
            background: #34495e;
            border-left-color: #3498db;
        }
        .main-content {
            margin-left: 250px;
        }
        .stat-card {
            border-radius: 10px;
            transition: transform 0.3s;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar p-0">
                <div class="p-3 text-center border-bottom">
                    <img src="../ASET/logo_fiksi_coffe.png" alt="Logo" width="50" class="mb-2">
                    <h5 class="mb-0">Fiksi Cafe Admin</h5>
                    <small class="text-muted">Admin Panel</small>
                </div>
                <nav class="nav flex-column mt-3">
                    <a class="nav-link active" href="index.php">
                        <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                    </a>
                    <a class="nav-link" href="products.php">
                        <i class="fas fa-coffee me-2"></i>Kelola Produk
                    </a>
                    <a class="nav-link" href="users.php">
                        <i class="fas fa-users me-2"></i>Kelola User
                    </a>
                    <a class="nav-link" href="categories.php">
                        <i class="fas fa-tags me-2"></i>Kategori
                    </a>
                    <a class="nav-link" href="logout.php">
                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                    </a>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 main-content p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2><i class="fas fa-tachometer-alt me-2"></i>Dashboard</h2>
                    <span class="text-muted"><?php echo date('l, d F Y'); ?></span>
                </div>

                <!-- Statistik -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card stat-card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4><?php echo $users_count; ?></h4>
                                        <p class="mb-0">Total Users</p>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="fas fa-users fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card stat-card bg-success text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4><?php echo $products_count; ?></h4>
                                        <p class="mb-0">Total Produk</p>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="fas fa-coffee fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card stat-card bg-warning text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4><?php echo $categories_count; ?></h4>
                                        <p class="mb-0">Kategori</p>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="fas fa-tags fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card stat-card bg-info text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4><?php echo $best_sellers_count; ?></h4>
                                        <p class="mb-0">Best Seller</p>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="fas fa-star fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Produk Terbaru -->
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Produk Terbaru</h5>
                                <a href="products.php" class="btn btn-sm btn-primary">Lihat Semua</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Gambar</th>
                                                <th>Nama Produk</th>
                                                <th>Harga</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($new_products as $product): ?>
                                            <tr>
                                                <td>
                                                    <img src="<?php echo $product['image_url']; ?>" 
                                                         alt="<?php echo $product['name']; ?>" 
                                                         width="50" height="50" 
                                                         style="object-fit: cover; border-radius: 5px;"
                                                         onerror="this.src='../ASET/kopi.png'">
                                                </td>
                                                <td><?php echo $product['name']; ?></td>
                                                <td>Rp <?php echo number_format($product['price'], 0, ',', '.'); ?></td>
                                                <td>
                                                    <?php if ($product['is_best_seller']): ?>
                                                        <span class="badge bg-warning">Best Seller</span>
                                                    <?php endif; ?>
                                                    <?php if ($product['is_available']): ?>
                                                        <span class="badge bg-success">Tersedia</span>
                                                    <?php else: ?>
                                                        <span class="badge bg-danger">Habis</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <a href="products.php?edit=<?php echo $product['id']; ?>" 
                                                       class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Quick Actions</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-grid gap-2">
                                    <a href="products.php?action=add" class="btn btn-success">
                                        <i class="fas fa-plus me-2"></i>Tambah Produk
                                    </a>
                                    <a href="users.php" class="btn btn-info">
                                        <i class="fas fa-user-plus me-2"></i>Kelola User
                                    </a>
                                    <a href="categories.php" class="btn btn-warning">
                                        <i class="fas fa-tags me-2"></i>Kelola Kategori
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>