<?php
// BACK-END/daftar.php
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
    if (empty($nama) || empty($email) || empty($password)) {
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
                    // Simpan success message di session
                    $_SESSION['register_success'] = $success;
                    header("Location: ../frontend/login.php");
                    exit();
                } else {
                    $error = "Terjadi kesalahan saat pendaftaran. Silakan coba lagi.";
                }
            }
        } else {
            $error = "Koneksi database gagal. Silakan coba lagi.";
        }
    }
    
    // Jika ada error, simpan di session
    if ($error) {
        $_SESSION['register_error'] = $error;
        $_SESSION['form_data'] = $_POST;
        header("Location: ../frontend/daftar.php");
        exit();
    }
}
?>