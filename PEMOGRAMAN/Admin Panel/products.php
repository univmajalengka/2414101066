<?php
// Hapus session_start dan pengecekan login
require_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();

// Handle form actions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_product'])) {
        // Tambah produk baru
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category_id = $_POST['category_id'];
        $is_best_seller = isset($_POST['is_best_seller']) ? 1 : 0;
        $is_available = isset($_POST['is_available']) ? 1 : 0;
        
        // Handle file upload
        $image_url = '../ASET/kopi.png'; // default image
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $upload_dir = 'uploads/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }
            
            $file_extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $filename = 'product_' . time() . '.' . $file_extension;
            $target_file = $upload_dir . $filename;
            
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                $image_url = $target_file;
            }
        }
        
        $query = "INSERT INTO products (name, description, price, image_url, category_id, is_best_seller, is_available) 
                  VALUES (:name, :description, :price, :image_url, :category_id, :is_best_seller, :is_available)";
        $stmt = $db->prepare($query);
        $stmt->execute([
            ':name' => $name,
            ':description' => $description,
            ':price' => $price,
            ':image_url' => $image_url,
            ':category_id' => $category_id,
            ':is_best_seller' => $is_best_seller,
            ':is_available' => $is_available
        ]);
        
        header("Location: products.php?success=Produk berhasil ditambahkan");
        exit;
    }
    
    if (isset($_POST['edit_product'])) {
        // Edit produk
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category_id = $_POST['category_id'];
        $is_best_seller = isset($_POST['is_best_seller']) ? 1 : 0;
        $is_available = isset($_POST['is_available']) ? 1 : 0;
        
        // Handle file upload jika ada gambar baru
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $upload_dir = 'uploads/';
            $file_extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $filename = 'product_' . time() . '.' . $file_extension;
            $target_file = $upload_dir . $filename;
            
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                $image_url = $target_file;
                $query = "UPDATE products SET name=:name, description=:description, price=:price, 
                         image_url=:image_url, category_id=:category_id, is_best_seller=:is_best_seller, 
                         is_available=:is_available WHERE id=:id";
            }
        } else {
            $query = "UPDATE products SET name=:name, description=:description, price=:price, 
                     category_id=:category_id, is_best_seller=:is_best_seller, 
                     is_available=:is_available WHERE id=:id";
        }
        
        $stmt = $db->prepare($query);
        $params = [
            ':name' => $name,
            ':description' => $description,
            ':price' => $price,
            ':category_id' => $category_id,
            ':is_best_seller' => $is_best_seller,
            ':is_available' => $is_available,
            ':id' => $id
        ];
        
        if (isset($image_url)) {
            $params[':image_url'] = $image_url;
        }
        
        $stmt->execute($params);
        
        header("Location: products.php?success=Produk berhasil diupdate");
        exit;
    }
}

// Handle delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $db->prepare("DELETE FROM products WHERE id = :id");
    $stmt->execute([':id' => $id]);
    header("Location: products.php?success=Produk berhasil dihapus");
    exit;
}

// Ambil semua produk
$products = $db->query("
    SELECT p.*, c.name as category_name 
    FROM products p 
    LEFT JOIN categories c ON p.category_id = c.id 
    ORDER BY p.created_at DESC
")->fetchAll(PDO::FETCH_ASSOC);

// Ambil kategori untuk dropdown
$categories = $db->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC);

// Ambil data produk untuk edit
$edit_product = null;
if (isset($_GET['edit'])) {
    $stmt = $db->prepare("SELECT * FROM products WHERE id = :id");
    $stmt->execute([':id' => $_GET['edit']]);
    $edit_product = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Produk - Fiksi Cafe</title>
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
        .product-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 5px;
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
                </div>
                <nav class="nav flex-column mt-3">
                    <a class="nav-link" href="index.php">
                        <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                    </a>
                    <a class="nav-link active" href="products.php">
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
                    <h2><i class="fas fa-coffee me-2"></i>Kelola Produk</h2>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productModal">
                        <i class="fas fa-plus me-2"></i>Tambah Produk
                    </button>
                </div>

                <?php if (isset($_GET['success'])): ?>
                    <div class="alert alert-success"><?php echo $_GET['success']; ?></div>
                <?php endif; ?>

                <!-- Tabel Produk -->
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Gambar</th>
                                        <th>Nama Produk</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($products as $product): ?>
                                    <tr>
                                        <td>
                                            <img src="<?php echo $product['image_url']; ?>" 
                                                 alt="<?php echo $product['name']; ?>" 
                                                 class="product-img"
                                                 onerror="this.src='../ASET/kopi.png'">
                                        </td>
                                        <td><?php echo $product['name']; ?></td>
                                        <td><?php echo $product['category_name']; ?></td>
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
                                            <a href="?edit=<?php echo $product['id']; ?>" 
                                               class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="?delete=<?php echo $product['id']; ?>" 
                                               class="btn btn-sm btn-outline-danger"
                                               onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                                <i class="fas fa-trash"></i>
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
        </div>
    </div>

    <!-- Modal Tambah/Edit Produk -->
    <div class="modal fade" id="productModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <?php echo $edit_product ? 'Edit Produk' : 'Tambah Produk Baru'; ?>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?php echo $edit_product ? $edit_product['id'] : ''; ?>">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Nama Produk</label>
                                    <input type="text" name="name" class="form-control" 
                                           value="<?php echo $edit_product ? $edit_product['name'] : ''; ?>" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Harga</label>
                                    <input type="number" name="price" class="form-control" 
                                           value="<?php echo $edit_product ? $edit_product['price'] : ''; ?>" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Kategori</label>
                                    <select name="category_id" class="form-control" required>
                                        <option value="">Pilih Kategori</option>
                                        <?php foreach ($categories as $category): ?>
                                        <option value="<?php echo $category['id']; ?>"
                                            <?php echo ($edit_product && $edit_product['category_id'] == $category['id']) ? 'selected' : ''; ?>>
                                            <?php echo $category['name']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Gambar Produk</label>
                                    <input type="file" name="image" class="form-control" accept="image/*">
                                    <?php if ($edit_product && $edit_product['image_url']): ?>
                                        <div class="mt-2">
                                            <img src="<?php echo $edit_product['image_url']; ?>" 
                                                 alt="Current Image" width="100" 
                                                 onerror="this.src='../ASET/kopi.png'">
                                        </div>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" name="is_best_seller" class="form-check-input"
                                            <?php echo ($edit_product && $edit_product['is_best_seller']) ? 'checked' : ''; ?>>
                                        <label class="form-check-label">Best Seller</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="is_available" class="form-check-input"
                                            <?php echo ($edit_product && $edit_product['is_available']) ? 'checked' : ''; ?>>
                                        <label class="form-check-label">Tersedia</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="description" class="form-control" rows="3" required><?php echo $edit_product ? $edit_product['description'] : ''; ?></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="<?php echo $edit_product ? 'edit_product' : 'add_product'; ?>" 
                                class="btn btn-primary">
                            <?php echo $edit_product ? 'Update Produk' : 'Tambah Produk'; ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
    
    <script>
        <?php if (isset($_GET['edit']) || isset($_GET['action']) && $_GET['action'] == 'add'): ?>
            document.addEventListener('DOMContentLoaded', function() {
                var modal = new bootstrap.Modal(document.getElementById('productModal'));
                modal.show();
            });
        <?php endif; ?>
    </script>
</body>
</html>