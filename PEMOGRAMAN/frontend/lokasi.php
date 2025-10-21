<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lokasi Fiksi Cafe - Tempat Nyaman untuk Kopi dan Cerita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
      .hero-section {
        height: 60vh;
        background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1554118811-1e0d58224f24?auto=format&fit=crop&w=1600&q=80') no-repeat center center/cover;
      }
      
      .section-padding {
        padding: 80px 0;
      }
      
      .info-card {
        transition: transform 0.3s;
        border-left: 4px solid #8B4513;
      }
      
      .info-card:hover {
        transform: translateY(-5px);
      }
      
      .map-container {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      }
      
      .transport-icon {
        font-size: 2rem;
        color: #8B4513;
        margin-bottom: 1rem;
      }
      
      .navbar-brand {
        font-weight: bold;
        font-size: 1.5rem;
      }
      
      .location-feature {
        text-align: center;
        padding: 20px;
      }
    </style>
  </head>
  <body id="page-top">
<?php include('../layout/header.html'); ?>

    <!-- Hero Section -->
    <section class="hero-section text-white d-flex align-items-center">
      <div class="container text-center">
        <h1 class="display-4 fw-bold mb-4">Lokasi Fiksi Cafe</h1>
        <p class="lead mb-4">Temukan kami di lokasi strategis dengan suasana yang nyaman dan mudah diakses</p>
      </div>
    </section>

    <!-- Lokasi Utama -->
    <section class="section-padding">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <h2 class="fw-bold mb-4">Kunjungi Cafe Kami</h2>
            <p class="lead mb-4">Fiksi Cafe berada di lokasi yang strategis di jantung kota Majalengka, mudah dijangkau dari berbagai penjuru kota.</p>
            
            <div class="card info-card shadow-sm mb-4">
              <div class="card-body">
                <h5 class="card-title"><i class="fas fa-map-marker-alt text-danger me-2"></i>Alamat Lengkap</h5>
                <p class="card-text">Jl. Contoh No.123, Kelurahan Situ, Kecamatan Majalengka, Kabupaten Majalengka, Jawa Barat 45411</p>
              </div>
            </div>
            
            <div class="card info-card shadow-sm mb-4">
              <div class="card-body">
                <h5 class="card-title"><i class="fas fa-clock text-primary me-2"></i>Jam Operasional</h5>
                <p class="card-text mb-1"><strong>Senin - Jumat:</strong> 09.00 - 22.00 WIB</p>
                <p class="card-text mb-1"><strong>Sabtu - Minggu:</strong> 08.00 - 23.00 WIB</p>
                <p class="card-text"><strong>Hari Libur:</strong> 10.00 - 20.00 WIB</p>
              </div>
            </div>
            
            <div class="card info-card shadow-sm">
              <div class="card-body">
                <h5 class="card-title"><i class="fas fa-phone text-success me-2"></i>Kontak</h5>
                <p class="card-text mb-1"><strong>Telepon:</strong> (0233) 123456</p>
                <p class="card-text mb-1"><strong>WhatsApp:</strong> 0812-3456-7890</p>
                <p class="card-text"><strong>Email:</strong> fiksi.cafe@mail.com</p>
              </div>
            </div>
          </div>
          
          <div class="col-lg-6">
            <div class="map-container">
              <!-- Google Maps Embed -->
              <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.95231599073!2d108.22790657588844!3d-6.836787366416992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f2faa3d6b1b21%3A0x76a0c3e588d2f6d5!2sMajalengka%2C%20Kec.%20Majalengka%2C%20Kabupaten%20Majalengka%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1690000000000!5m2!1sid!2sid" 
                width="100%" 
                height="450" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
              </iframe>
            </div>
            
            <div class="mt-4">
              <a href="https://maps.google.com/?q=Jl.+Contoh+No.123,Majalengka" target="_blank" class="btn btn-primary me-2">
                <i class="fas fa-directions me-2"></i>Dapatkan Petunjuk Arah
              </a>
              <a href="orderonline.html" class="btn btn-outline-primary">
                <i class="fas fa-motorcycle me-2"></i>Order Delivery
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Fasilitas Lokasi -->
    <section class="section-padding bg-light">
      <div class="container">
        <div class="row text-center mb-5">
          <div class="col-lg-8 mx-auto">
            <h2 class="fw-bold mb-3">Fasilitas & Keunggulan Lokasi</h2>
            <p class="lead">Fiksi Cafe didesain untuk kenyamanan maksimal pengunjung</p>
          </div>
        </div>
        
        <div class="row g-4">
          <div class="col-md-4">
            <div class="location-feature">
              <div class="transport-icon">
                <i class="fas fa-parking"></i>
              </div>
              <h4>Area Parkir Luas</h4>
              <p>Parkir yang nyaman dan aman untuk mobil dan motor dengan kapasitas hingga 50 kendaraan.</p>
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="location-feature">
              <div class="transport-icon">
                <i class="fas fa-subway"></i>
              </div>
              <h4>Akses Transportasi</h4>
              <p>Mudah dijangkau dengan angkutan umum, dekat dengan halte bus dan terminal.</p>
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="location-feature">
              <div class="transport-icon">
                <i class="fas fa-wifi"></i>
              </div>
              <h4>WiFi Cepat</h4>
              <p>Koneksi internet berkecepatan tinggi di seluruh area cafe untuk mendukung aktivitas digital.</p>
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="location-feature">
              <div class="transport-icon">
                <i class="fas fa-child"></i>
              </div>
              <h4>Area Ramah Anak</h4>
              <p>Ruang khusus untuk keluarga dengan anak-anak, dilengkapi mainan dan buku anak.</p>
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="location-feature">
              <div class="transport-icon">
                <i class="fas fa-snowflake"></i>
              </div>
              <h4>AC & Ventilasi Baik</h4>
              <p>Suasana nyaman dengan sistem pendingin dan sirkulasi udara yang optimal.</p>
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="location-feature">
              <div class="transport-icon">
                <i class="fas fa-utensils"></i>
              </div>
              <h4>Ruang Terbuka</h4>
              <p>Tersedia outdoor seating dengan pemandangan taman yang menenangkan.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Cara Menuju Lokasi -->
    <section class="section-padding">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h2 class="fw-bold text-center mb-5">Cara Menuju Fiksi Cafe</h2>
            
            <div class="row">
              <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                  <div class="card-body">
                    <h4 class="card-title"><i class="fas fa-car text-primary me-2"></i>Dengan Kendaraan Pribadi</h4>
                    <p class="card-text">Dari pusat kota Majalengka, ikuti Jalan Siliwangi hingga tiba di perempatan Situ. Belok kiri ke Jalan Contoh, Fiksi Cafe berada di sebelah kanan jalan, sekitar 200 meter dari perempatan.</p>
                    <p class="card-text"><strong>Estimasi waktu:</strong> 10-15 menit dari alun-alun kota</p>
                  </div>
                </div>
              </div>
              
              <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                  <div class="card-body">
                    <h4 class="card-title"><i class="fas fa-bus text-success me-2"></i>Dengan Angkutan Umum</h4>
                    <p class="card-text">Naik angkot jurusan Situ-Tanjungsari dan turun di halte SMPN 1 Majalengka. Dari sana, berjalan kaki sekitar 5 menit ke arah utara menyusuri Jalan Contoh.</p>
                    <p class="card-text"><strong>Tarif:</strong> Rp 5.000 - Rp 7.000</p>
                  </div>
                </div>
              </div>
              
              <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                  <div class="card-body">
                    <h4 class="card-title"><i class="fas fa-motorcycle text-warning me-2"></i>Dengan Ojek Online</h4>
                    <p class="card-text">Gunakan aplikasi Gojek atau Grab, ketik "Fiksi Cafe Majalengka" sebagai tujuan. Driver akan mengantarkan Anda tepat di depan cafe.</p>
                    <p class="card-text"><strong>Estimasi biaya:</strong> Rp 10.000 - Rp 20.000 (tergantung jarak)</p>
                  </div>
                </div>
              </div>
              
              <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                  <div class="card-body">
                    <h4 class="card-title"><i class="fas fa-bicycle text-info me-2"></i>Dengan Sepeda atau Jalan Kaki</h4>
                    <p class="card-text">Bagi yang tinggal di sekitar area Situ, cafe dapat dicapai dengan bersepeda atau berjalan kaki melalui jalur pedestrian yang aman dan nyaman.</p>
                    <p class="card-text"><strong>Fasilitas:</strong> Tersedia rak sepeda yang aman</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Cabang Lain -->
    <section class="section-padding bg-primary text-white">
      <div class="container">
        <div class="row text-center">
          <div class="col-lg-8 mx-auto">
            <h2 class="fw-bold mb-3">Cabang Lain Segera Hadir</h2>
            <p class="lead mb-4">Kami sedang mempersiapkan cabang baru di kota-kota sekitar untuk semakin dekat dengan Anda</p>
            <div class="d-flex flex-wrap justify-content-center gap-3">
              <span class="badge bg-light text-dark p-3">Cirebon</span>
              <span class="badge bg-light text-dark p-3">Kuningan</span>
              <span class="badge bg-light text-dark p-3">Indramayu</span>
              <span class="badge bg-light text-dark p-3">Ciamis</span>
            </div>
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