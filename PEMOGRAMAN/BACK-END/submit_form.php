<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    // Validasi sederhana
    if (empty($name) || empty($email) || empty($message)) {
        echo "All fields are required.";
        exit;
    }
    
    // Email penerima (ganti dengan email Anda)
    $to = "your-email@example.com";
    $subject = "New Message from The Tavern Coffee Website";
    $body = "Name: $name\nEmail: $email\nMessage: $message";
    $headers = "From: $email";
    
    // Kirim email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you for your message! We will get back to you soon.";
    } else {
        echo "Sorry, there was an error sending your message. Please try again later.";
    }
} else {
    // Jika bukan metode POST, redirect ke homepage
    header("Location: index.html");
    exit;
}
?>