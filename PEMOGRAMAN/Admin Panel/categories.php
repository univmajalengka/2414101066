<?php

require_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();

// Tambah kategori
if (isset($_POST['add_category'])) {
    $name = $_POST['name'];
    $stmt = $db->prepare("INSERT INTO categories (name) VALUES (:name)");
    $stmt->execute([':name' => $name]);
    header("Location: categories.php?success=Kategori berhasil ditambahkan");
    exit;
}

// Edit kategori
if (isset($_POST['edit_category'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $stmt = $db->prepare("UPDATE categories SET name = :name WHERE id = :id");
    $stmt->execute([':name' => $name, ':id' => $id]);
    header("Location: categories.php?success=Kategori berhasil diupdate");
    exit;
}

// Hapus kategori
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $db->prepare("DELETE FROM categories WHERE id = :id");
    $stmt->execute([':id' => $id]);
    header("Location: categories.php?success=Kategori berhasil dihapus");
    exit;
}

// Ambil semua kategori
$categories = $db->query("SELECT * FROM categories ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);

// Ambil data kategori untuk edit
$edit_category = null;
if (isset($_GET['edit'])) {
    $stmt = $db->prepare("SELECT * FROM categories WHERE id = :id");
    $stmt->execute([':id' => $_GET['edit']]);
    $edit_category = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Kategori - Fiksi Cafe</title>
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
                    <a class="nav-link" href="products.php">
                        <i class="fas fa-coffee me-2"></i>Kelola Produk
                    </a>
                    <a class="nav-link" href="users.php">
                        <i class="fas fa-users me-2"></i>Kelola User
                    </a>
                    <a class="nav-link active" href="categories.php">
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
                    <h2><i class="fas fa-tags me-2"></i>Kelola Kategori</h2>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoryModal">
                        <i class="fas fa-plus me-2"></i>Tambah Kategori
                    </button>
                </div>

                <?php if (isset($_GET['success'])): ?>
                    <div class="alert alert-success"><?php echo $_GET['success']; ?></div>
                <?php endif; ?>

                <!-- Tabel Kategori -->
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach ($categories as $category): ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo htmlspecialchars($category['name']); ?></td>
                                        <td>
                                            <a href="?edit=<?php echo $category['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="?delete=<?php echo $category['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus kategori ini?')">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php if (empty($categories)): ?>
                                    <tr>
                                        <td colspan="3" class="text-center">Tidak ada data kategori.</td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah/Edit Kategori -->
    <div class="modal fade" id="categoryModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <?php echo $edit_category ? 'Edit Kategori' : 'Tambah Kategori'; ?>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <?php if ($edit_category): ?>
                            <input type="hidden" name="id" value="<?php echo $edit_category['id']; ?>">
                        <?php endif; ?>
                        <div class="mb-3">
                            <label class="form-label">Nama Kategori</label>
                            <input type="text" name="name" class="form-control" required value="<?php echo $edit_category['name'] ?? ''; ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="<?php echo $edit_category ? 'edit_category' : 'add_category'; ?>" class="btn btn-primary">
                            <?php echo $edit_category ? 'Update' : 'Tambah'; ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
    <script>
        <?php if ($edit_category): ?>
            document.addEventListener('DOMContentLoaded', function() {
                var modal = new bootstrap.Modal(document.getElementById('categoryModal'));
                modal.show();
            });
        <?php endif; ?>
    </script>
</body>
</html>