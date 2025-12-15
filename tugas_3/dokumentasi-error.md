# Dokumentasi Error Program Di Tugas 3

Dokumen ini berisi daftar kesalahan (error) yang ditemukan pada program beserta penyebab dan cara perbaikannya.

1. Error DOCTYPE HTML  
Penulisan `<!DOCTYPE>` salah sehingga browser tidak dapat mengenali standar HTML.  
Perbaikan: Gunakan `<!DOCTYPE html>`.

2. Tidak Ada Validasi `isset()`  
Program langsung mengakses `$_POST` tanpa pengecekan.  
Perbaikan: Gunakan `if (isset($_POST['nama'])) { ... }`.

3. Kesalahan Keyword SQL  
Query menggunakan `VALUE` padahal seharusnya `VALUES`.  
Perbaikan: `INSERT INTO tabel (...) VALUES (...);`

4. Tidak Menggunakan Prepared Statement  
Query langsung memakai input pengguna sehingga berisiko SQL Injection.  
Perbaikan: Gunakan `mysqli_prepare()`.

5. Variabel PHP Tidak Menggunakan Simbol `$`  
Variabel `sekolah` ditulis tanpa simbol `$` sehingga menyebabkan error saat dijalankan.  
Perbaikan: `$sekolah = $_POST['sekolah_asal'];`

6. Tidak Ada Validasi Input Kosong  
Form tetap diproses walaupun data tidak lengkap.  
Perbaikan: Gunakan `if (empty($nama)) { ... }`.

7. Redirect Tanpa `exit`  
Script tetap berjalan setelah perintah `header()`.  
Perbaikan: Tambahkan `exit;` setelah redirect.

8. Charset Database Tidak Ditentukan  
Koneksi database tidak mengatur charset sehingga bisa terjadi error karakter.  
Perbaikan: `mysqli_set_charset($koneksi, "utf8mb4");`.

9. Struktur Tabel Tidak Optimal  
Tabel tidak memiliki kolom `created_at` untuk mencatat waktu input data.  
Perbaikan: Tambahkan kolom `created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP`.

10. Tidak Ada Sanitasi Input  
Input dari pengguna tidak disaring sehingga berisiko XSS.  
Perbaikan: Gunakan `htmlspecialchars()`.