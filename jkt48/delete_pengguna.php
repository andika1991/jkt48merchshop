<?php
// Include koneksi ke database
include 'koneksi.php';

// Pastikan parameter id_produk telah diterima
if(isset($_GET['id_pengguna'])) {
    // Sanitasi input id_produk
    $id_pengguna = mysqli_real_escape_string($conn, $_GET['id_pengguna']);

    // Query hapus data produk berdasarkan id_produk
    $query = "DELETE FROM pengguna WHERE id_pengguna = '$id_pengguna'";
    
    // Eksekusi query
    if(mysqli_query($conn, $query)) {
        // Jika penghapusan berhasil, redirect ke halaman manajemen produk
        header("Location: manajemenpengguna.php");
        exit(); // Hentikan proses eksekusi skrip
    } else {
        // Jika terjadi kesalahan saat menghapus, tampilkan pesan kesalahan
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
} else {
    // Jika parameter id_produk tidak diterima, tampilkan pesan kesalahan
    echo "ID Produk tidak ditemukan.";
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
