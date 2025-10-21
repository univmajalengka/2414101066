<?php
session_start();
require_once '../config/database.php';

$error = '';

// Jika sudah login, redirect ke beranda
if (isset($_SESSION['user_id'])) {
    header("Location: beranda.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Validasi input
    if (empty($email) || empty($password)) {
        $error = "Harap isi semua field yang diperlukan.";
    } else {
        $database = new Database();
        $db = $database->getConnection();
        
        if ($db) {
            // Cek user di database
            $query = "SELECT id, email, password, full_name, role, is_active FROM users WHERE email = :email";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':email', $email);
            
            if ($stmt->execute()) {
                if ($stmt->rowCount() == 1) {
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                    // Verifikasi password
                    if (password_verify($password, $user['password'])) {
                        if ($user['is_active'] == 1) {
                            // Update last login
                            $update_query = "UPDATE users SET last_login = NOW() WHERE id = :id";
                            $update_stmt = $db->prepare($update_query);
                            $update_stmt->bindParam(':id', $user['id']);
                            $update_stmt->execute();
                            
                            // Set session
                            $_SESSION['user_id'] = $user['id'];
                            $_SESSION['user_email'] = $user['email'];
                            $_SESSION['user_name'] = $user['full_name'];
                            $_SESSION['user_role'] = $user['role'];
                            $_SESSION['logged_in'] = true;
                            
                            // Redirect ke halaman beranda
                            header("Location: index.php");
                            exit();
                        } else {
                            $error = "Akun Anda tidak aktif. Silakan hubungi administrator.";
                        }
                    } else {
                        $error = "Email atau password salah.";
                    }
                } else {
                    $error = "Email atau password salah.";
                }
            } else {
                $error = "Terjadi kesalahan sistem. Silakan coba lagi.";
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
    <title>Learning Cafe - Login</title>
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
      
      .divider {
        display: flex;
        align-items: center;
        margin: 25px 0;
      }
      
      .divider::before, .divider::after {
        content: "";
        flex: 1;
        border-bottom: 1px solid #ddd;
      }
      
      .divider-text {
        padding: 0 15px;
        color: #777;
        font-size: 14px;
      }
      
      .social-login {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-bottom: 20px;
      }
      
      .social-btn {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 18px;
        transition: all 0.3s;
      }
      
      .social-btn:hover {
        transform: translateY(-3px);
      }
      
      .btn-google {
        background: #DB4437;
      }
      
      .btn-facebook {
        background: #4267B2;
      }
      
      .btn-twitter {
        background: #1DA1F2;
      }
      
      .login-footer {
        text-align: center;
        padding: 20px 30px;
        background-color: #f8f9fa;
        border-top: 1px solid #eee;
      }
      
      .login-footer a {
        color: #6f4e37;
        text-decoration: none;
        font-weight: 500;
      }
      
      .login-footer a:hover {
        text-decoration: underline;
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
          <h3>Learning Cafe</h3>
          <p>Nikmati kopi bersama ilmunya juga</p>
        </div>
        
        <div class="login-body">
          <!-- Tampilkan error PHP -->
          <?php if ($error): ?>
            <div class="alert alert-warning" role="alert">
              <i class="fas fa-exclamation-triangle me-2"></i>
              <?php echo htmlspecialchars($error); ?>
            </div>
          <?php endif; ?>
          
          <form id="loginForm" method="POST" action="">
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
                <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
                <button class="input-group-text" type="button" id="togglePassword">
                  <i class="fas fa-eye" id="toggleIcon"></i>
                </button>
              </div>
            </div>
            
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe" 
                     <?php echo isset($_POST['rememberMe']) ? 'checked' : ''; ?>>
              <label class="form-check-label" for="rememberMe">Ingat saya</label>
              <a href="lupa-password.php" class="float-end">Lupa kata sandi?</a>
            </div>
            
            <div class="d-grid gap-2 mb-3">
              <button type="submit" class="btn btn-coffee">
                <i class="fas fa-sign-in-alt me-2"></i>Login
              </button>
            </div>
            
            <div class="divider">
              <span class="divider-text">Atau login dengan</span>
            </div>
            
            <div class="social-login">
              <a href="#" class="social-btn btn-google">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-btn btn-facebook">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-btn btn-twitter">
                <i class="fab fa-twitter"></i>
              </a>
            </div>
          </form>
        </div>
        
        <div class="login-footer">
          <p class="mb-0">Belum punya akun? <a href="daftar.php">Daftar</a></p>
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
        
        // Client-side validation (opsional)
        const loginForm = document.getElementById('loginForm');
        loginForm.addEventListener('submit', function(e) {
          const email = document.getElementById('email').value;
          const password = document.getElementById('password').value;
          
          // Reset error state
          const existingAlert = document.querySelector('.alert.alert-warning');
          if (existingAlert && !existingAlert.querySelector('i.fa-exclamation-triangle')) {
            existingAlert.remove();
          }
          
          // Simple validation
          if (!email || !password) {
            e.preventDefault();
            showError('Harap isi semua field yang diperlukan.');
            return;
          }
          
          if (!isValidEmail(email)) {
            e.preventDefault();
            showError('Format email tidak valid.');
            return;
          }
          
          // Show loading state
          const submitBtn = loginForm.querySelector('button[type="submit"]');
          submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Memproses...';
          submitBtn.disabled = true;
        });
        
        function isValidEmail(email) {
          const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
          return re.test(email);
        }
        
        function showError(message) {
          // Remove existing client-side error
          const existingError = document.getElementById('clientError');
          if (existingError) {
            existingError.remove();
          }
          
          // Create error alert
          const errorAlert = document.createElement('div');
          errorAlert.className = 'alert alert-warning';
          errorAlert.id = 'clientError';
          errorAlert.innerHTML = `<i class="fas fa-exclamation-triangle me-2"></i>${message}`;
          
          // Insert at the top of form
          const loginBody = document.querySelector('.login-body');
          const form = document.getElementById('loginForm');
          loginBody.insertBefore(errorAlert, form);
          
          // Scroll to error message
          errorAlert.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }
      });
    </script>
  </body>
</html>