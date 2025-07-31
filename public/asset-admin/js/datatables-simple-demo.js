window.addEventListener('DOMContentLoaded', event => {
    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        console.log("Tabel ditemukan, menginisialisasi DataTable...");
        try {
            const dataTable = new simpleDatatables.DataTable(datatablesSimple, {
                columns: [
                    { select: 6, hidden: true } // Menyembunyikan kolom ke-5 (email)
                ]
            });
            console.log("DataTable berhasil diinisialisasi");
        } catch (error) {
            console.log("Error saat menginisialisasi DataTable:", error);
        }
    } else {
        console.log("Tabel tidak ditemukan, periksa ID.");
    }
});
