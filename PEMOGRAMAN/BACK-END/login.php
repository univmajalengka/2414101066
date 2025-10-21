<?php
// BACK-END/login.php
session_start();
require_once '../config/database.php';

$error = '';

// Jika sudah login, redirect ke beranda
if (isset($_SESSION['user_id'])) {
    header("Location: ../frontend/index.php");
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
                            
                            // Redirect berdasarkan role
                            if ($user['role'] == 'admin') {
                                header("Location: ../Admin Panel/index.php");
                            } else {
                                header("Location: ../frontend/index.php");
                            }
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

// Jika ada error, simpan di session untuk ditampilkan di frontend
if ($error) {
    $_SESSION['login_error'] = $error;
    header("Location: ../frontend/login.php");
    exit();
}
?>