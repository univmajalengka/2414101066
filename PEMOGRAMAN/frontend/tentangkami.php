<?php
// No PHP logic needed for this static page currently
?>
<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tentang Kami - Fiksi Cafe</title>
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
      
      .timeline {
        position: relative;
        padding-left: 30px;
      }
      
      .timeline::before {
        content: '';
        position: absolute;
        left: 15px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: #8B4513;
      }
      
      .timeline-item {
        position: relative;
        margin-bottom: 30px;
      }
      
      .timeline-item::before {
        content: '';
        position: absolute;
        left: -38px;
        top: 5px;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: #8B4513;
        border: 3px solid white;
        box-shadow: 0 0 0 3px #8B4513;
      }
      
      .value-card {
        transition: transform 0.3s;
        border: none;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      }
      
      .value-card:hover {
        transform: translateY(-10px);
      }
      
      .value-icon {
        font-size: 3rem;
        color: #8B4513;
        margin-bottom: 1rem;
      }
      
      .team-card {
        transition: transform 0.3s;
        border: none;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      }
      
      .team-card:hover {
        transform: translateY(-5px);
      }
      
      .team-img {
        height: 250px;
        object-fit: cover;
      }
      
      .navbar-brand {
        font-weight: bold;
        font-size: 1.5rem;
      }
      
      .stat-number {
        font-size: 3rem;
        font-weight: bold;
        color: #8B4513;
      }
    </style>
  </head>
  <body id="page-top">
    <!-- Navbar -->
<?php include('../layout/header.html'); ?>
    <!-- Hero Section -->
    <section class="hero-section text-white d-flex align-items-center">
      <div class="container text-center">
        <h1 class="display-4 fw-bold mb-4">Tentang Fiksi Cafe</h1>
        <p class="lead mb-4">Lebih dari sekadar kedai kopi, kami adalah ruang cerita dan inspirasi</p>
      </div>
    </section>

    <!-- Sejarah & Cerita -->
    <section class="section-padding">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <h2 class="fw-bold mb-4">Cerita Kami Dimulai</h2>
            <p class="lead mb-4">Fiksi Cafe lahir dari kecintaan mendalam terhadap kopi dan keinginan untuk menciptakan ruang yang hangat bagi komunitas.</p>
            <p>Didirikan pada tahun 2018 oleh tiga sahabat yang memiliki passion di dunia kopi dan sastra, Fiksi Cafe awalnya hanyalah sebuah impian sederhana: menciptakan tempat di mana orang bisa menikmati kopi berkualitas sambil terhubung melalui cerita dan obrolan bermakna.</p>
            <p>Dari sebuah ruangan kecil di sudut kota Majalengka, kami berkembang menjadi destinasi favorit para pencinta kopi, pembaca buku, dan mereka yang mencari ketenangan di tengah kesibukan kota.</p>
            
            <div class="mt-5">
              <div class="timeline">
                <div class="timeline-item">
                  <h5>2018 - Awal Mula</h5>
                  <p>Fiksi Cafe dibuka dengan konsep coffee & book cafe pertama di Majalengka</p>
                </div>
                <div class="timeline-item">
                  <h5>2019 - Ekspansi Menu</h5>
                  <p>Meluncurkan menu makanan ringan dan memperluas koleksi buku</p>
                </div>
                <div class="timeline-item">
                  <h5>2020 - Adaptasi Digital</h5>
                  <p>Menghadapi pandemi dengan sistem takeaway dan delivery yang efisien</p>
                </div>
                <div class="timeline-item">
                  <h5>2022 - Penghargaan</h5>
                  <p>Mendapatkan penghargaan "Best Coffee Shop" dari Majalengka Food Awards</p>
                </div>
                <div class="timeline-item">
                  <h5>2024 - Ekspansi</h5>
                  <p>Merencanakan pembukaan cabang pertama di kota Cirebon</p>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-lg-6">
            <div class="row g-3">
              <div class="col-6">
                <img src="https://images.unsplash.com/photo-1447933601403-0c6688de566e?auto=format&fit=crop&w=600&q=80" 
                     alt="Interior Fiksi Cafe" class="img-fluid rounded shadow">
              </div>
              <div class="col-6">
                <img src="https://images.unsplash.com/photo-1461023058943-07fcbe16d735?auto=format&fit=crop&w=600&q=80" 
                     alt="Koleksi Buku Fiksi Cafe" class="img-fluid rounded shadow">
              </div>
              <div class="col-6 mt-3">
                <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=600&q=80" 
                     alt="Proses Pembuatan Kopi" class="img-fluid rounded shadow">
              </div>
              <div class="col-6 mt-3">
                <img src="https://images.unsplash.com/photo-1559925393-8be0ec4767c8?auto=format&fit=crop&w=600&q=80" 
                     alt="Suasana Cafe" class="img-fluid rounded shadow">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Visi Misi -->
    <section class="section-padding bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="card value-card h-100">
              <div class="card-body text-center p-5">
                <div class="value-icon">
                  <i class="fas fa-eye"></i>
                </div>
                <h3 class="card-title mb-4">Visi Kami</h3>
                <p class="card-text">Menjadi destinasi kopi terdepan yang tidak hanya menyajikan minuman berkualitas, tetapi juga menciptakan ruang inspiratif bagi komunitas untuk berbagi cerita, ide, dan kreativitas.</p>
                <p class="card-text">Kami berkomitmen untuk menjadi bagian dari kehidupan sehari-hari masyarakat Majalengka melalui pengalaman kafe yang tak terlupakan.</p>
              </div>
            </div>
          </div>
          
          <div class="col-lg-6">
            <div class="card value-card h-100">
              <div class="card-body text-center p-5">
                <div class="value-icon">
                  <i class="fas fa-bullseye"></i>
                </div>
                <h3 class="card-title mb-4">Misi Kami</h3>
                <ul class="list-unstyled text-start">
                  <li class="mb-3"><i class="fas fa-check text-success me-2"></i> Menyajikan kopi dan makanan dengan kualitas terbaik</li>
                  <li class="mb-3"><i class="fas fa-check text-success me-2"></i> Menciptakan lingkungan yang nyaman dan inspiratif</li>
                  <li class="mb-3"><i class="fas fa-check text-success me-2"></i> Mendukung komunitas lokal dan UMKM</li>
                  <li class="mb-3"><i class="fas fa-check text-success me-2"></i> Mengedukasi masyarakat tentang budaya kopi</li>
                  <li class="mb-3"><i class="fas fa-check text-success me-2"></i> Berinovasi terus menerus dalam pelayanan</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Nilai-Nilai -->
    <section class="section-padding">
      <div class="container">
        <div class="row text-center mb-5">
          <div class="col-lg-8 mx-auto">
            <h2 class="fw-bold mb-3">Nilai-Nilai Kami</h2>
            <p class="lead">Prinsip yang menjadi pedoman dalam setiap layanan kami</p>
          </div>
        </div>
        
        <div class="row g-4">
          <div class="col-md-4">
            <div class="card value-card h-100 text-center">
              <div class="card-body p-4">
                <div class="value-icon">
                  <i class="fas fa-heart"></i>
                </div>
                <h4>Passion</h4>
                <p>Kami menyajikan setiap cangkir kopi dengan penuh cinta dan dedikasi. Passion adalah bahan rahasia dalam setiap menu kami.</p>
              </div>
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="card value-card h-100 text-center">
              <div class="card-body p-4">
                <div class="value-icon">
                  <i class="fas fa-users"></i>
                </div>
                <h4>Komunitas</h4>
                <p>Kami percaya pada kekuatan komunitas. Fiksi Cafe adalah ruang untuk bertemu, berbagi, dan tumbuh bersama.</p>
              </div>
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="card value-card h-100 text-center">
              <div class="card-body p-4">
                <div class="value-icon">
                  <i class="fas fa-leaf"></i>
                </div>
                <h4>Keberlanjutan</h4>
                <p>Kami berkomitmen pada praktik bisnis yang berkelanjutan dan ramah lingkungan dalam setiap operasional.</p>
              </div>
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="card value-card h-100 text-center">
              <div class="card-body p-4">
                <div class="value-icon">
                  <i class="fas fa-star"></i>
                </div>
                <h4>Kualitas</h4>
                <p>Dari pemilihan biji kopi hingga penyajian, kami tidak pernah berkompromi dengan kualitas.</p>
              </div>
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="card value-card h-100 text-center">
              <div class="card-body p-4">
                <div class="value-icon">
                  <i class="fas fa-lightbulb"></i>
                </div>
                <h4>Inovasi</h4>
                <p>Terus berinovasi dalam menu dan layanan untuk memberikan pengalaman terbaik bagi pelanggan.</p>
              </div>
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="card value-card h-100 text-center">
              <div class="card-body p-4">
                <div class="value-icon">
                  <i class="fas fa-handshake"></i>
                </div>
                <h4>Integritas</h4>
                <p>Kejujuran dan transparansi menjadi fondasi dalam setiap hubungan dengan pelanggan dan mitra.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Tim Kami -->
    <section class="section-padding bg-light">
      <div class="container">
        <div class="row text-center mb-5">
          <div class="col-lg-8 mx-auto">
            <h2 class="fw-bold mb-3">Tim Kami</h2>
            <p class="lead">Orang-orang di balik kesuksesan Fiksi Cafe</p>
          </div>
        </div>
        
        <div class="row g-4">
          <div class="col-md-4">
            <div class="card team-card h-100 text-center">
              <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80" 
                   class="card-img-top team-img" alt="Founder Fiksi Cafe">
              <div class="card-body">
                <h5 class="card-title">Ahmad Fauzi</h5>
                <p class="text-muted">Founder & Head Barista</p>
                <p class="card-text">Berkecimpung di industri kopi selama 10 tahun. Spesialis dalam roasting dan brewing techniques.</p>
              </div>
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="card team-card h-100 text-center">
              <img src="https://images.unsplash.com/photo-1494790108755-2616c113a1d1?auto=format&fit=crop&w=600&q=80" 
                   class="card-img-top team-img" alt="Co-Founder Fiksi Cafe">
              <div class="card-body">
                <h5 class="card-title">Sari Dewi</h5>
                <p class="text-muted">Co-Founder & Manager</p>
                <p class="card-text">Ahli dalam manajemen operasional dan customer service. Memastikan setiap pengunjung merasa di rumah.</p>
              </div>
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="card team-card h-100 text-center">
              <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=600&q=80" 
                   class="card-img-top team-img" alt="Head Chef Fiksi Cafe">
              <div class="card-body">
                <h5 class="card-title">Rizki Pratama</h5>
                <p class="text-muted">Head Chef</p>
                <p class="card-text">Jago membuat makanan pendamping kopi yang lezat. Kreator semua menu makanan di Fiksi Cafe.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Pencapaian -->
    <section class="section-padding">
      <div class="container">
        <div class="row text-center">
          <div class="col-md-3 mb-4">
            <div class="stat-number">5+</div>
            <h5>Tahun Pengalaman</h5>
            <p class="text-muted">Melayani dengan konsisten sejak 2018</p>
          </div>
          <div class="col-md-3 mb-4">
            <div class="stat-number">50.000+</div>
            <h5>Pelanggan Setia</h5>
            <p class="text-muted">Yang mempercayai kopi dan pelayanan kami</p>
          </div>
          <div class="col-md-3 mb-4">
            <div class="stat-number">15+</div>
            <h5>Penghargaan</h5>
            <p class="text-muted">Dalam industri kopi dan hospitality</p>
          </div>
          <div class="col-md-3 mb-4">
            <div class="stat-number">1000+</div>
            <h5>Koleksi Buku</h5>
            <p class="text-muted">Tersedia untuk dinikmati pengunjung</p>
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