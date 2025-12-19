<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM pesanan WHERE id='$id'");
$d = mysqli_fetch_array($data);
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Pesanan Paket Wisata</title>
<link rel="stylesheet" href="asset/css/style.css">
<script src="asset/js/scripts.js"></script>
</head>
<body>

<div class="form-container">
    <h2>Edit Pesanan Paket Wisata</h2>

   <form method="POST" action="pemess_simpan.php" onsubmit="return true;">

        <input type="hidden" name="id" value="<?= $d['id']; ?>">

        <div class="form-group">
            <label>Nama Pemesan</label>
            <input type="text" name="nama" value="<?= $d['nama']; ?>" required>
        </div>

        <div class="form-group">
            <label>No HP</label>
            <input type="text" name="hp" value="<?= $d['hp']; ?>" required>
        </div>

        <div class="form-group">
            <label>Tanggal Pesan</label>
            <input type="date" name="tanggal" value="<?= $d['tanggal']; ?>" required>
        </div>

        <div class="form-group">
            <label>Waktu Perjalanan (Hari)</label>
            <input type="number" id="hari" name="hari" value="<?= $d['hari']; ?>" required>
        </div>

        <div class="form-group">
            <label>Jumlah Peserta</label>
            <input type="number" id="peserta" name="peserta" value="<?= $d['peserta']; ?>" required>
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

        <!-- NILAI LAMA -->
        <input type="hidden" name="harga" id="harga" value="<?= $d['harga']; ?>">
        <input type="hidden" name="total" id="total" value="<?= $d['total']; ?>">

        <!-- TAMPILAN TOTAL -->
        <div class="form-group total-box">
            <p>Harga Paket</p>
            <h3 id="hargaTampil">Rp <?= number_format($d['harga'],0,',','.'); ?></h3>
        </div>

        <div class="form-group total-box">
            <p>Total Tagihan</p>
            <h2 id="totalTampil">Rp <?= number_format($d['total'],0,',','.'); ?></h2>
        </div>

        <button type="submit" class="btn-submit">Update Pesanan</button>
    </form>

    <a href="modifikasi_pesanan.php" class="back-link">← Kembali ke Daftar Pesanan</a>
</div>

</body>
</html>
