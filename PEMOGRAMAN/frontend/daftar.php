<?php
session_start();
require_once '../config/database.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['full_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    
    // Validasi
    if (empty($nama) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = "Harap isi semua field yang diperlukan.";
    } elseif ($password !== $confirm_password) {
        $error = "Konfirmasi password tidak sesuai.";
    } elseif (strlen($password) < 6) {
        $error = "Password minimal 6 karakter.";
    } else {
        $database = new Database();
        $db = $database->getConnection();
        
        if ($db) {
            // Cek apakah email sudah terdaftar
            $check_query = "SELECT id FROM users WHERE email = :email";
            $check_stmt = $db->prepare($check_query);
            $check_stmt->bindParam(':email', $email);
            
            if ($check_stmt->execute() && $check_stmt->rowCount() > 0) {
                $error = "Email sudah terdaftar.";
            } else {
                // Insert user baru
                $insert_query = "INSERT INTO users (email, password, full_name, created_at) 
                               VALUES (:email, :password, :full_name, NOW())";
                $insert_stmt = $db->prepare($insert_query);
                
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                
                $insert_stmt->bindParam(':email', $email);
                $insert_stmt->bindParam(':password', $hashed_password);
                $insert_stmt->bindParam(':full_name', $nama);
                
                if ($insert_stmt->execute()) {
                    $success = "Pendaftaran berhasil! Silakan login.";
                } else {
                    $error = "Terjadi kesalahan saat pendaftaran. Silakan coba lagi.";
                }
            }
        } else {
            $error = "Koneksi database gagal. Silakan coba lagi.";
        }
    }
}
?>
<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Learning Cafe - Daftar</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
      body {
        background: url('https://images.unsplash.com/photo-1554118811-1e0d58224f24?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1974&q=80') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Poppins', sans-serif;
        min-height: 100vh;
        display: flex;
        align-items: center;
      }
      
      .login-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
      }
      
      .login-card {
        max-width: 450px;
        width: 100%;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 15px;
        box-shadow: 0px 15px 30px rgba(0,0,0,0.3);
        overflow: hidden;
        backdrop-filter: blur(10px);
      }
      
      .login-header {
        text-align: center;
        padding: 40px 30px 20px;
        background: linear-gradient(135deg, #6f4e37 0%, #5b3c2a 100%);
        color: white;
      }
      
      .login-header h3 {
        font-weight: 700;
        margin-top: 15px;
        margin-bottom: 5px;
      }
      
      .login-header p {
        opacity: 0.9;
        margin-bottom: 0;
      }
      
      .logo-container {
        width: 120px;
        height: 120px;
        margin: 0 auto 15px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      }
      
      .logo-container i {
        font-size: 50px;
        color: white;
      }
      
      .login-body {
        padding: 30px;
      }
      
      .form-label {
        font-weight: 500;
        color: #5b3c2a;
        margin-bottom: 8px;
      }
      
      .form-control {
        padding: 12px 15px;
        border-radius: 8px;
        border: 1px solid #ddd;
        transition: all 0.3s;
      }
      
      .form-control:focus {
        border-color: #6f4e37;
        box-shadow: 0 0 0 0.25rem rgba(111, 78, 55, 0.25);
      }
      
      .input-group-text {
        background-color: #f8f9fa;
        border: 1px solid #ddd;
        border-right: none;
      }
      
      .btn-coffee {
        background: linear-gradient(135deg, #6f4e37 0%, #5b3c2a 100%);
        color: #fff;
        border: none;
        padding: 12px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s;
      }
      
      .btn-coffee:hover {
        background: linear-gradient(135deg, #5b3c2a 0%, #4a3122 100%);
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(91, 60, 42, 0.4);
      }
      
      .alert {
        border-radius: 8px;
        padding: 12px 15px;
      }
      
      @media (max-width: 576px) {
        .login-card {
          max-width: 100%;
        }
        
        .login-header {
          padding: 30px 20px 15px;
        }
        
        .login-body {
          padding: 20px;
        }
      }
    </style>
  </head>
  <body>

    <div class="login-container">
      <div class="login-card">
        <div class="login-header">
          <div class="logo-container">
            <i class="fas fa-coffee"></i>
          </div>
          <h3>Learning Cafe - Daftar</h3>
          <p>Bergabunglah dengan komunitas kami</p>
        </div>
        
        <div class="login-body">
          <!-- Tampilkan error -->
          <?php if ($error): ?>
            <div class="alert alert-danger" role="alert">
              <i class="fas fa-exclamation-triangle me-2"></i>
              <?php echo htmlspecialchars($error); ?>
            </div>
          <?php endif; ?>
          
          <!-- Tampilkan success -->
          <?php if ($success): ?>
            <div class="alert alert-success" role="alert">
              <i class="fas fa-check-circle me-2"></i>
              <?php echo htmlspecialchars($success); ?>
            </div>
          <?php endif; ?>
          
          <form method="POST" action="">
            <div class="mb-3">
              <label for="full_name" class="form-label">Nama Lengkap</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" class="form-control" id="full_name" name="full_name" 
                       value="<?php echo isset($_POST['full_name']) ? htmlspecialchars($_POST['full_name']) : ''; ?>" 
                       placeholder="Nama lengkap Anda" required>
              </div>
            </div>
            
            <div class="mb-3">
              <label for="email" class="form-label">Alamat Email</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                <input type="email" class="form-control" id="email" name="email" 
                       value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" 
                       placeholder="nama@email.com" required>
              </div>
            </div>
            
            <div class="mb-3">
              <label for="password" class="form-label">Kata Sandi</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input type="password" class="form-control" id="password" name="password" placeholder="Minimal 6 karakter" required>
                <button class="input-group-text" type="button" id="togglePassword">
                  <i class="fas fa-eye" id="toggleIcon"></i>
                </button>
              </div>
            </div>
            
            <div class="mb-3">
              <label for="confirm_password" class="form-label">Konfirmasi Kata Sandi</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Ulangi kata sandi" required>
              </div>
            </div>
            
            <div class="d-grid gap-2 mb-3">
              <button type="submit" class="btn btn-coffee">
                <i class="fas fa-user-plus me-2"></i>Daftar
              </button>
            </div>
          </form>
        </div>
        
        <div class="login-footer">
          <p class="mb-0">Sudah punya akun? <a href="login.php">Login</a></p>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.getElementById('toggleIcon');
        
        // Toggle password visibility
        togglePassword.addEventListener('click', function() {
          const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
          passwordInput.setAttribute('type', type);
          toggleIcon.classList.toggle('fa-eye');
          toggleIcon.classList.toggle('fa-eye-slash');
        });
      });
    </script>
  </body>
</html>