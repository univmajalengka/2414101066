<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fiksi Cafe - Tempat Nyaman untuk Kopi dan Cerita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
      .hero-section {
        height: 90vh;
        background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('../ASET/tampilanawal.jpg') no-repeat center center/cover;
      }
      
      .section-padding {
        padding: 80px 0;
      }
      
      .feature-icon {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        color: #8B4513;
      }
      
      .menu-card {
        transition: transform 0.3s;
        height: 100%;
      }
      
      .menu-card:hover {
        transform: translateY(-5px);
      }
      
      .testimonial-card {
        background-color: #f8f9fa;
        border-left: 4px solid #8B4513;
      }
      
      .navbar-brand {
        font-weight: bold;
        font-size: 1.5rem;
      }
    </style>
  </head>
  <body id="page-top">
<?php include('../layout/header.html'); ?>

    <!-- Hero Section -->
    <section id="home" class="hero-section text-white d-flex align-items-center">
      <div class="container text-center">
        <h1 class="display-3 fw-bold mb-4">Selamat Datang di Fiksi Cafe</h1>
        <p class="lead mb-4">Tempat nyaman untuk menikmati kopi, buku, cerita, dan suasana hangat.</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
          <a href="#menu" class="btn btn-primary btn-lg px-4 gap-3">Lihat Menu</a>
          <a href="#order" class="btn btn-outline-light btn-lg px-4">Order Online</a>
        </div>
      </div>
    </section>

    <!-- Fitur Unggulan -->
    <section class="section-padding bg-light">
      <div class="container">
        <div class="row text-center mb-5">
          <div class="col-lg-8 mx-auto">
            <h2 class="fw-bold mb-3">Mengapa Memilih Fiksi Cafe?</h2>
            <p class="lead">Kami menawarkan pengalaman kafe yang tak terlupakan dengan berbagai keunggulan</p>
          </div>
        </div>
        <div class="row g-4">
          <div class="col-md-4 text-center">
            <div class="feature-icon">
              <i class="fas fa-coffee"></i>
            </div>
            <h4>Kopi Berkualitas</h4>
            <p>Dibuat dari biji kopi pilihan dengan teknik penyeduhan terbaik oleh barista profesional.</p>
          </div>
          <div class="col-md-4 text-center">
            <div class="feature-icon">
              <i class="fas fa-book"></i>
            </div>
            <h4>Perpustakaan Mini</h4>
            <p>Nikmati berbagai koleksi buku sambil menyeruput kopi favorit Anda.</p>
          </div>
          <div class="col-md-4 text-center">
            <div class="feature-icon">
              <i class="fas fa-wifi"></i>
            </div>
            <h4>WiFi Cepat</h4>
            <p>Koneksi internet berkecepatan tinggi untuk mendukung aktivitas kerja dan belajar.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Menu Populer -->
    <section id="menu" class="section-padding">
      <div class="container">
        <div class="row text-center mb-5">
          <div class="col-lg-8 mx-auto">
            <h2 class="fw-bold mb-3">Menu Favorit</h2>
            <p class="lead">Rasakan kelezatan signature menu kami</p>
          </div>
        </div>
        <div class="row g-4">
          <div class="col-md-4">
            <div class="card menu-card shadow-sm">
              <img src="https://images.unsplash.com/photo-1544787219-7f47ccb76574?auto=format&fit=crop&w=500&q=80" class="card-img-top" alt="Espresso">
              <div class="card-body">
                <h5 class="card-title">Espresso Fiksi</h5>
                <p class="card-text">Espresso dengan cita rasa kuat dan aroma yang menggugah selera.</p>
                <p class="fw-bold text-primary">Rp 25.000</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card menu-card shadow-sm">
              <img src="https://images.unsplash.com/photo-1572442388796-11668a67e53d?auto=format&fit=crop&w=500&q=80" class="card-img-top" alt="Latte Art">
              <div class="card-body">
                <h5 class="card-title">Latte Art Special</h5>
                <p class="card-text">Latte dengan seni gambar yang indah di atas busa susu yang lembut.</p>
                <p class="fw-bold text-primary">Rp 35.000</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card menu-card shadow-sm">
              <img src="https://images.unsplash.com/photo-1563729784474-d77dbb933a9e?auto=format&fit=crop&w=500&q=80" class="card-img-top" alt="Croissant">
              <div class="card-body">
                <h5 class="card-title">Croissant Almond</h5>
                <p class="card-text">Croissant renyah dengan isian almond yang gurih dan manis.</p>
                <p class="fw-bold text-primary">Rp 28.000</p>
              </div>
            </div>
          </div>
        </div>
        <div class="text-center mt-5">
          <a href="menu.html" class="btn btn-outline-primary btn-lg">Lihat Semua Menu</a>
        </div>
      </div>
    </section>

    <!-- Testimonial -->
    <section class="section-padding bg-light">
      <div class="container">
        <div class="row text-center mb-5">
          <div class="col-lg-8 mx-auto">
            <h2 class="fw-bold mb-3">Apa Kata Pelanggan?</h2>
            <p class="lead">Testimoni dari pengunjung Fiksi Cafe</p>
          </div>
        </div>
        <div class="row g-4">
          <div class="col-md-4">
            <div class="card testimonial-card p-4 h-100">
              <div class="card-body">
                <div class="mb-3">
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                </div>
                <p class="card-text">"Suasana yang sangat nyaman untuk bekerja atau sekadar bersantai. Kopinya enak dan pelayanannya ramah!"</p>
                <div class="d-flex align-items-center mt-3">
                  <div>
                    <h6 class="mb-0">Rina Sari</h6>
                    <small class="text-muted">Freelancer</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card testimonial-card p-4 h-100">
              <div class="card-body">
                <div class="mb-3">
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                </div>
                <p class="card-text">"Tempat favorit saya untuk meeting klien. WiFi cepat, kopi berkualitas, dan makanan ringannya lezat."</p>
                <div class="d-flex align-items-center mt-3">
                  <div>
                    <h6 class="mb-0">Ahmad Fauzi</h6>
                    <small class="text-muted">Business Owner</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card testimonial-card p-4 h-100">
              <div class="card-body">
                <div class="mb-3">
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star-half-alt text-warning"></i>
                </div>
                <p class="card-text">"Koleksi bukunya lengkap dan nyaman untuk membaca. Saya sering menghabiskan waktu di sini di akhir pekan."</p>
                <div class="d-flex align-items-center mt-3">
                  <div>
                    <h6 class="mb-0">Dewi Lestari</h6>
                    <small class="text-muted">Mahasiswa</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Order Online -->
    <section id="order" class="section-padding bg-primary text-white">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-8">
            <h2 class="fw-bold mb-3">Ingin Menikmati Menu Kami di Rumah?</h2>
            <p class="lead mb-4">Pesan online sekarang dan nikmati kopi berkualitas tanpa harus keluar rumah.</p>
          </div>
          <div class="col-lg-4 text-lg-end">
            <a href="orderonline.html" class="btn btn-light btn-lg px-4">Order Online Sekarang</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 mb-4 mb-lg-0">
            <h5 class="text-uppercase mb-4">Fiksi Cafe</h5>
            <p>Tempat nyaman untuk menikmati kopi, buku, cerita, dan suasana hangat.</p>
            <div class="mt-4">
              <a href="#" class="text-white me-3"><i class="fab fa-facebook fa-lg"></i></a>
              <a href="#" class="text-white me-3"><i class="fab fa-instagram fa-lg"></i></a>
              <a href="#" class="text-white me-3"><i class="fab fa-tiktok fa-lg"></i></a>
              <a href="#" class="text-white me-3"><i class="fab fa-whatsapp fa-lg"></i></a>
              <a href="#" class="text-white"><i class="fab fa-youtube fa-lg"></i></a>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <h5 class="text-uppercase mb-4">Kontak Kami</h5>
            <p class="mb-2"><i class="fas fa-map-marker-alt me-2"></i>Jl. Contoh No.123, Majalengka</p>
            <p class="mb-2"><i class="fas fa-phone me-2"></i>0812-3456-7890</p>
            <p class="mb-2"><i class="fas fa-envelope me-2"></i>fiksi.cafe@mail.com</p>
            <p><i class="fas fa-clock me-2"></i>Buka: 09.00 - 22.00 WIB</p>
          </div>
          <div class="col-lg-4">
            <h5 class="text-uppercase mb-4">Newsletter</h5>
            <p>Dapatkan informasi promo dan menu terbaru dari Fiksi Cafe</p>
            <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="Email Anda" aria-label="Email">
              <button class="btn btn-primary" type="button">Daftar</button>
            </div>
          </div>
        </div>
        <hr class="my-4">
        <div class="row align-items-center">
          <div class="col-md-6">
            <p class="mb-0">&copy; 2025 Fiksi Cafe. All rights reserved.</p>
          </div>
          <div class="col-md-6 text-md-end">
            <p class="mb-0">Powered By : Moch Lutfi Hilmi Fathurohman</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>