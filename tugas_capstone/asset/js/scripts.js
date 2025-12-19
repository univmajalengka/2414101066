document.addEventListener("DOMContentLoaded", function () {

    function formatRupiah(angka) {
        return 'Rp ' + angka.toLocaleString('id-ID');
    }

    function hitungTotal() {
        let layanan = document.querySelectorAll('.layanan:checked');
        let harga = 0;

        layanan.forEach(l => harga += parseInt(l.value));

        let hariInput = document.getElementById('hari').value;
        let pesertaInput = document.getElementById('peserta').value;

        let hari = hariInput !== '' ? parseInt(hariInput) : 0;
        let peserta = pesertaInput !== '' ? parseInt(pesertaInput) : 0;

        let total = harga * hari * peserta;

        // simpan ke hidden input
        document.getElementById('harga').value = harga;
        document.getElementById('total').value = total;

        // tampilkan ke user (LANGSUNG)
        document.getElementById('hargaTampil').innerText = formatRupiah(harga);
        document.getElementById('totalTampil').innerText = formatRupiah(total);
    }

    // 🔥 EVENT LANGSUNG DI CHECKBOX
    document.querySelectorAll('.layanan').forEach(el => {
        el.addEventListener('change', hitungTotal);
    });

    // 🔥 EVENT SAAT NGETIK
    document.getElementById('hari').addEventListener('input', hitungTotal);
    document.getElementById('peserta').addEventListener('input', hitungTotal);

});
