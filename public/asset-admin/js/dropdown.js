function updateJudulOrder() {
    var jenis = document.getElementById('jenis').value; // Ambil nilai dari dropdown jenis
    var judulOrderSelect = document.getElementById('judul');
    
    console.log('Jenis yang dipilih: ', jenis);  // Log jenis yang dipilih

    // Kosongkan dropdown judul_order terlebih dahulu
    judulOrderSelect.innerHTML = "<option value=''>Pilih Subkategori</option>";

    var options = [];

    // Tentukan subkategori berdasarkan pilihan jenis
    if (jenis === 'Layanan Permohonan') {
        options = [
            "Permohonan Server, Aplikasi, Calotation dan Domain",
            "Permohonan Pointing dan Integrasi",
            "Permohonan Upload dan Publikasi",
            "Permohonan Jaringan",
            "Permohonan Pembuatan dan Kapasitas Akun dan Email",
            "Permohonan Peminjaman Ruangan",
            "Permohonan Kunjungan Data Center dan Server"
        ];
    } else if (jenis === 'Layanan Gangguan') {
        options = [
            "Gangguan VPN Tidak Terhubung, Internet Lambat, dan Bandwidth Error",
            "Error Kendala Aplikasi",
            "Permasalahan Akun dan Email"
        ];
    }

    // Tambahkan opsi ke dropdown judul_order
    options.forEach(function(optionText) {
        var option = document.createElement('option');
        option.value = optionText;
        option.textContent = optionText;
        judulOrderSelect.appendChild(option);
    });
}

// Panggil fungsi updateJudulOrder saat halaman pertama kali dimuat
window.onload = function() {
    updateJudulOrder(); // Pastikan judul_order langsung terisi ketika halaman dimuat
};
