<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisata Gunung Ciwaru Majalengka</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(to bottom, #f8f9fa, #e9ecef);
            color: #333;
            scroll-behavior: smooth;
        }
        
        header {
            background: linear-gradient(to right, #088395, #05BFDB);
            color: white;
            padding: 25px 0;
            text-align: center;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        
        h1 {
            font-size: 2.2rem;
            margin-bottom: 10px;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
        }
        
        .tagline {
            font-size: 1.1rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
        }
        
/* HAMBURGER ICON */
/* HAMBURGER ICON WITH WHITE BOX */
.hamburger {
    width: 55px;            /* lebih panjang */
    height: 40px;           /* lebih tinggi */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    cursor: pointer;

    position: fixed;
    top: 12px;
    right: 15px;
    z-index: 250;

    background: white;              /* kotak putih */
    border-radius: 10px;            /* sudut lembut */
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    border: 1.5px solid #ddd;       /* biar keliatan */
}

.hamburger span {
    width: 50%;                     /* ukuran garis */
    height: 4px;
    background: #088395;            /* warna garis */
    border-radius: 5px;
    margin: 3px 0;
    transition: 0.4s;
}

/* NAVBAR */
.topbar {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 65px;
    background: white;
    z-index: 200;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

nav {
    background: white;
    width: 100%;
    display: flex;
    justify-content: center;
    gap: 25px;
    padding: 15px;
    flex-wrap: wrap;
    position: sticky;
    top: 0;
    z-index: 150;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

nav a {
    text-decoration: none;
    color: #333;
    font-weight: bold;
    padding: 8px 16px;
    border-radius: 20px;
    transition: 0.3s;
}

nav a:hover,
nav a.active {
    background: #088395;
    color: white;
}

        
        .banner {
            width: 100%;
            height: 400px;
            background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('asset/1.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            padding: 20px;
        }
        
        .banner-content {
            max-width: 800px;
        }
        
        .banner h2 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.5);
        }
        
        .banner p {
            font-size: 1.2rem;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        
        .section {
            margin-bottom: 60px;
            scroll-margin-top: 100px;
        }
        
        .section-title {
            font-size: 1.8rem;
            color: #088395;
            margin-bottom: 25px;
            padding-bottom: 10px;
            border-bottom: 2px solid #05BFDB;
            display: flex;
            align-items: center;
        }
        
        .section-title i {
            margin-right: 10px;
            font-size: 1.5rem;
        }
        
        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 20px;
        }
        
        .card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }
        
        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.5s;
        }
        
        .card:hover img {
            transform: scale(1.05);
        }
        
        .card-body {
            padding: 20px;
        }
        
        .card-body h3 {
            color: #088395;
            margin-bottom: 10px;
            font-size: 1.3rem;
        }
        
        .price-list {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-top: 20px;
        }
        
        .price-item {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px dashed #e0e0e0;
        }
        
        .price-item:last-child {
            border-bottom: none;
        }
        
        .facilities {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }
        
        .facility {
            background: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
            transition: transform 0.3s;
        }
        
        .facility:hover {
            transform: translateY(-5px);
        }
        
        .facility i {
            font-size: 2rem;
            color: #05BFDB;
            margin-bottom: 10px;
        }
        
        /* GALERI SLIDER */
        .gallery-container {
            position: relative;
            width: 100%;
            margin: 30px 0;
            overflow: hidden;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
        
        .gallery-track {
            display: flex;
            width: max-content;
            animation: slide 30s linear infinite;
        }
        
        .gallery-slide {
            width: 300px;
            height: 200px;
            flex-shrink: 0;
            margin-right: 15px;
            border-radius: 8px;
            overflow: hidden;
            position: relative;
        }
        
        .gallery-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }
        
        .gallery-slide:hover img {
            transform: scale(1.1);
        }
        
        .gallery-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0,0,0,0.7));
            color: white;
            padding: 10px;
            transform: translateY(100%);
            transition: transform 0.3s;
        }
        
        .gallery-slide:hover .gallery-overlay {
            transform: translateY(0);
        }
        
        @keyframes slide {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
            }
        }
        
        .gallery-controls {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }
        
        .gallery-btn {
            background: #088395;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: bold;
        }
        
        .gallery-btn:hover {
            background: #05BFDB;
            transform: translateY(-3px);
        }
        
        .video-container {
            position: relative;
            width: 100%;
            height: 0;
            padding-bottom: 56.25%;
            margin-top: 20px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
        }
        
        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
        
        .note {
            background: #e3f2fd;
            padding: 15px;
            border-radius: 8px;
            margin-top: 15px;
            border-left: 4px solid #2196f3;
        }
        
        footer {
            background: linear-gradient(to right, #045e6e, #088395);
            color: white;
            text-align: center;
            padding: 30px 20px;
            margin-top: 40px;
        }
        
@media (max-width: 768px) {

    nav ul{
        display: flex;
    }

    nav {
        display: none;
        flex-direction: column;
        gap: 15px;
        padding: 20px;
        background: white;
        position: fixed;
        top: 0;
        right: 0;
        width: 70%;
        height: 100%;
        box-shadow: -5px 0 15px rgba(0,0,0,0.1);
        animation: slideIn 0.2s ease;
    }

    nav.show {
        display: flex;
    }

    nav a {
        text-align: left;
        font-size: 1.1rem;
        padding: 12px 20px;
    }
}

@keyframes slideIn {
    from { transform: translateX(100%); opacity: 0; }
    to { transform: translateX(0); opacity: 1; }
}

    </style>
</head>
<body>

<!-- NAVBAR -->
<nav id="navMenu">
    <a href="#beranda" class="nav-link active">Beranda</a>
    <a href="#about" class="nav-link">Tentang</a>
    <a href="#obyek" class="nav-link">Obyek Wisata</a>
    <a href="#tiket" class="nav-link">Tiket Masuk</a>
    <a href="#fasilitas" class="nav-link">Fasilitas</a>
    <a href="#galeri" class="nav-link">Galeri</a>
    <a href="prosedex.php">Pemesanan</a>
</nav>
<!-- BANNER -->
<div class="banner" id="banner">
    <div class="banner-content">
        <h2>Gunung Ciwaru Majalengka</h2>
        <p>Destinasi wisata alam dengan pemandangan perbukitan, udara sejuk, dan spot foto unik.</p>
    </div>
</div>

    <div class="container">
        <!-- BERANDA -->
        <section id="beranda" class="section">
            <h2 class="section-title"><i class="fas fa-home"></i> Selamat Datang di Gunung Ciwaru</h2>
            <p>Gunung Ciwaru adalah bukit hutan pinus di Kabupaten Majalengka. Lokasinya masih berada di kawasan konservasi Taman Nasional Gunung Ciremai. Menawarkan daya tarik yang hampir mirip dengan Tebing Keraton di Bandung. Wisatawan dapat menikmati panorama gunung, hutan, perbukitan, hingga dataran rendah dari ketinggian. Suasananya adem dan sejuk, sangat pas untuk refreshing di akhir pekan.</p>
        </section>
        
        <!-- ABOUT -->
        <section id="about" class="section">
            <h2 class="section-title"><i class="fas fa-info-circle"></i> Tentang Wisata</h2>
            <p>Gunung Ciwaru adalah sebuah kawasan wisata alam di Desa Ciwaru, Majalengka. Tempat ini menawarkan pemandangan hijau, udara segar, spot foto unik, serta Rumah Hobbit yang menjadi ikon utama.</p>
            <p>Dengan ketinggian lokasi sekitar <b>900 mdpl</b>, Gunung Ciwaru memberikan suasana sejuk dan pemandangan yang menakjubkan. Tempat ini cocok untuk berbagai aktivitas seperti piknik keluarga, hunting foto, atau sekadar melepas penat dari kesibukan kota.</p>
            
            <div class="note">
                <p><i class="fas fa-lightbulb"></i> <b>Tips:</b> Datanglah pada pagi hari untuk menghindari kerumunan dan menikmati udara yang lebih segar.</p>
            </div>
        </section>
        
        <!-- OBYEK WISATA -->
        <section id="obyek" class="section">
            <h2 class="section-title"><i class="fas fa-mountain"></i> Obyek Wisata</h2>
            <p>Gunung Ciwaru menawarkan berbagai obyek wisata menarik yang bisa dinikmati oleh pengunjung:</p>
            
            <div class="card-container">
                
                <div class="card">
                    <img src="asset/2.jpg" alt="Gardu Pandang">
                    <div class="card-body">
                        <h3>Jalan Menuju Jurang</h3>
                        <p>Tempat terbaik untuk menikmati pemandangan perbukitan hijau dan langit luas. Cocok untuk melihat sunrise dan sunset.</p>
                    </div>
                </div>
                
                <div class="card">
                    <img src="asset/1.jpg" alt="Spot Foto Alam">
                    <div class="card-body">
                        <h3>Spot Foto Alam</h3>
                        <p>Berbagai spot foto kreatif dengan dekorasi kayu, love sign, ayunan, dan lainnya yang instagramable.</p>
                    </div>
                </div>
                
                <div class="card">
                    <img src="asset/4.jpg" alt="Pemandangan Alam">
                    <div class="card-body">
                        <h3>Buper (Bumi perkemahan)</h3>
                        <p>Area khusus untuk berkemah dengan fasilitas lengkap dan pemandangan alam yang asri.</p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- TIKET MASUK -->
        <section id="tiket" class="section">
            <h2 class="section-title"><i class="fas fa-ticket-alt"></i> Tiket Masuk & Harga</h2>
            <p>Berikut adalah informasi harga tiket masuk dan biaya lainnya di Gunung Ciwaru:</p>
            
            <div class="price-list">
                <div class="price-item">
                    <span>Penginapan</span>
                    <span><b>Rp 1.000.000</b></span>
                </div>
                <div class="price-item">
                    <span>Transportasi</span>
                    <span><b>Rp 1.200.000</b></span>
                </div>
                <div class="price-item">
                    <span>Service/Makan</span>
                    <span><b>Rp 500.000</b></span>
                </div>
              
            
            <div class="note">
                <p><i class="fas fa-exclamation-circle"></i> <b>Catatan:</b> Harga dapat berubah sewaktu-waktu. Disarankan untuk menghubungi pengelola sebelum berkunjung. Selain itu pengelola juga menyediakan jasa foto di setiap spotnya.</p>
                                <p><i class="fas fa-exclamation-circle"></i> <b>Jumlah Tagihan :</b> Waktu Perjalanan (Hari) x Jumlah Peserta x Harga Paket Perjalanan.</p>    
            </div>
        </section>
        
<!-- FASILITAS -->
<section id="fasilitas" class="section">
    <h2 class="section-title"><i class="fas fa-concierge-bell"></i> Fasilitas Wisata ✨</h2>
    <p>Gunung Ciwaru menyediakan berbagai fasilitas untuk kenyamanan pengunjung:</p>
    
    <div class="facilities">
        <div class="facility">
            <i class="fas fa-parking"></i>
            <h3>🚗 Area Parkir</h3>
            <p>Parkir luas untuk kendaraan roda dua dan empat</p>
        </div>
        
        <div class="facility">
            <i class="fas fa-utensils"></i>
            <h3>🍽️ Warung Makan</h3>
            <p>Berbagai pilihan makanan dan minuman</p>
        </div>
        
        <div class="facility">
            <i class="fas fa-restroom"></i>
            <h3>🚻 Toilet Umum</h3>
            <p>Fasilitas toilet yang bersih dan terawat</p>
        </div>
        
        <div class="facility">
            <i class="fas fa-camera"></i>
            <h3>📸 Spot Foto</h3>
            <p>Berbagai spot foto menarik dan instagramable</p>
        </div>
        
        <div class="facility">
            <i class="fas fa-tree"></i>
            <h3>🌳 Gazebo</h3>
            <p>Tempat bersantai dengan pemandangan alam</p>
        </div>
        
        <div class="facility">
            <i class="fas fa-wifi"></i>
            <h3>🛋️ Area Santai</h3>
            <p>Tempat nyaman untuk bersantai dan berkumpul</p>
        </div>
    </div>
</section>

        
        <!-- GALERI -->
        <section id="galeri" class="section">
            <h2 class="section-title"><i class="fas fa-images"></i> Galeri Foto & Video</h2>
            <p>Lihat momen-momen indah dan spot menarik di Gunung Ciwaru:</p>
            
            <!-- Galeri Slider Otomatis -->
            <div class="gallery-container">
                <div class="gallery-track">
                    <!-- Slide 1-8 (akan diulang untuk efek infinite) -->
                    <div class="gallery-slide">
                        <img src="asset/11.jpg" alt="Rumah Hobbit">
                        <div class="gallery-overlay">
                        </div>
                    </div>
                    <div class="gallery-slide">
                        <img src="asset/12.jpg" alt="Gardu Pandang">
                        <div class="gallery-overlay">
                        </div>
                    </div>
                    <div class="gallery-slide">
                        <img src="asset/10.jpg" alt="Spot Foto">
                        <div class="gallery-overlay">
                        </div>
                    </div>
                    <div class="gallery-slide">
                        <img src="asset/9.jpg" alt="Pemandangan">
                        <div class="gallery-overlay">
                        </div>
                    </div>
                    <div class="gallery-slide">
                        <img src="asset/8.jpg" alt="Alam Hijau">
                        <div class="gallery-overlay">
                        </div>
                    </div>
                    <div class="gallery-slide">
                        <img src="asset/7.jpg" alt="Spot Sunset">
                        <div class="gallery-overlay">
                        </div>
                    </div>
                    <div class="gallery-slide">
                        <img src="asset/6.jpg" alt="Pemandangan Lain">
                        <div class="gallery-overlay">
                        </div>
                    </div>
                    <div class="gallery-slide">
                        <img src="asset/5.jpg" alt="Spot Unik">
                        <div class="gallery-overlay">
                        </div>
                    </div>
                    <div class="gallery-slide">
                        <img src="asset/4.jpg" alt="Spot Unik">
                        <div class="gallery-overlay">
                        </div>
                    </div>
                    <div class="gallery-slide">
                        <img src="asset/3.jpg" alt="Spot Unik">
                        <div class="gallery-overlay">
                        </div>
                    </div>
                    <div class="gallery-slide">
                        <img src="asset/2.jpg" alt="Spot Unik">
                        <div class="gallery-overlay">
                        </div>
                    </div>
                    <div class="gallery-slide">
                        <img src="asset/1.jpg" alt="Spot Unik">
                        <div class="gallery-overlay">
                        </div>
                    </div>
                </section>

                
            <!-- Duplikat slide untuk efek infinite -->
             <section>
        <h3 style="margin-top: 40px; text-align: center;">Video Wisata Gunung Ciwaru</h3>
            <div class="video-container">
 <iframe 
                src="https://www.youtube.com/embed/89P2hSSHR4w?rel=1&modestbranding=1" 
                title="Video Wisata Gunung Ciwaru"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen>
            </iframe>
                </div>
        </section>
    </div>
    
    <footer>
        <p>&copy; 2023 Wisata Gunung Ciwaru</p>
        <p>Desa Ciwaru, Kecamatan Cikijing, Kabupaten Majalengka, Jawa Barat</p>
    </footer>
    
    <script>
document.querySelectorAll('nav a').forEach(anchor => {
    anchor.addEventListener('click', function(e) {

        const href = this.getAttribute('href');

        // ✅ JIKA LINK KE FILE PHP → BIARKAN PINDAH HALAMAN
        if (!href.startsWith('#')) {
            return;
        }

        // ❌ HANYA CEGAH DEFAULT UNTUK ANCHOR (#)
        e.preventDefault();

        document.querySelectorAll('nav a').forEach(link => {
            link.classList.remove('active');
        });

        this.classList.add('active');

        const targetSection = document.querySelector(href);
        window.scrollTo({
            top: targetSection.offsetTop - 80,
            behavior: 'smooth'
        });
    });
});

// Update active saat scroll
window.addEventListener('scroll', function() {
    const sections = document.querySelectorAll('.section');
    const navLinks = document.querySelectorAll('nav a');
    let current = '';

    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        if (pageYOffset >= sectionTop - 120) {
            current = section.getAttribute('id');
        }
    });

    navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === '#' + current) {
            link.classList.add('active');
        }
    });
});
        
        // Update active nav link saat scroll
        window.addEventListener('scroll', function() {
            const sections = document.querySelectorAll('.section');
            const navLinks = document.querySelectorAll('nav a');
            
            let current = '';
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (pageYOffset >= sectionTop - 100) {
                    current = section.getAttribute('id');
                }
            });
            
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === '#' + current) {
                    link.classList.add('active');
                }
            });
        });
        
        // Kontrol galeri slider
        const galleryTrack = document.querySelector('.gallery-track');
        let isPaused = false;
        
        function pauseSlide() {
            galleryTrack.style.animationPlayState = 'paused';
            isPaused = true;
        }
        
        function resumeSlide() {
            galleryTrack.style.animationPlayState = 'running';
            isPaused = false;
        }
        
        function restartSlide() {
            galleryTrack.style.animation = 'none';
            void galleryTrack.offsetWidth; // Trigger reflow
            galleryTrack.style.animation = 'slide 30s linear infinite';
            galleryTrack.style.animationPlayState = 'running';
            isPaused = false;
        }
        
        // Hentikan slider saat hover
        galleryTrack.addEventListener('mouseenter', function() {
            if (!isPaused) {
                this.style.animationPlayState = 'paused';
            }
        });
        
        galleryTrack.addEventListener('mouseleave', function() {
            if (!isPaused) {
                this.style.animationPlayState = 'running';
            }
        });
        
function toggleMenu() {
    document.getElementById("navMenu").classList.toggle("show");
}
    </script>
</body>
</html>