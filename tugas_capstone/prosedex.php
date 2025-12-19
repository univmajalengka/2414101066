<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Form Pemesanan Paket Wisata</title>
<link rel="stylesheet" href="asset/css/style.css">
<script src="asset/js/scripts.js"></script>
</head>
<body>

<div class="form-container">
    <h2>Form Pemesanan Paket Wisata</h2>

    <form action="pemess_simpan.php" method="POST" onsubmit="return hitung()">

        <div class="form-group">
            <label>Nama Pemesan</label>
            <input type="text" name="nama" required>
        </div>

        <div class="form-group">
            <label>No HP</label>
            <input type="text" name="hp" required>
        </div>

        <div class="form-group">
            <label>Tanggal Pesan</label>
            <input type="date" name="tanggal" required>
        </div>

        <div class="form-group">
            <label>Waktu Perjalanan (Hari)</label>
            <input type="number" id="hari" name="hari" required>
        </div>

        <div class="form-group">
            <label>Jumlah Peserta</label>
            <input type="number" id="peserta" name="peserta" required>
        </div>

        <div class="form-group">
            <label>Pelayanan</label>
            <div class="checkbox-group">
                <label><input type="checkbox" class="layanan" value="1000000"> Penginapan</label>
                <p>Rp 1.000.000</p>
                <label><input type="checkbox" class="layanan" value="1200000"> Transportasi</label>
                <p>Rp 1.200.000</p>
                <label><input type="checkbox" class="layanan" value="500000"> Makan</label>
                <p>Rp 500.000</p>
            </div>
        </div>

        <input type="hidden" name="harga" id="harga">
        <input type="hidden" name="total" id="total">

        <div class="form-group total-box">
    <p>Harga Paket:</p>
    <h3 id="hargaTampil">Rp 0</h3>
</div>

<div class="form-group total-box">
    <p>Total Tagihan:</p>
    <h2 id="totalTampil">Rp 0</h2>
</div>

        <button type="submit" class="btn-submit">Simpan Pesanan</button>
    </form>

    <a href="index.php" class="back-link">← Kembali ke Beranda</a>
</div>

</body>
</html>
