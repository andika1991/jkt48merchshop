<?php
session_start();
include 'koneksi.php';
$id_pengguna = $_SESSION['id_pengguna'];
$nama_penerima = mysqli_real_escape_string($conn, $_POST['nama']);
$alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
$total_pembayaran = isset($_POST['total_pembayaran']) ? mysqli_real_escape_string($conn, $_POST['total_pembayaran']) : 0;

$id_produk_dibeli = isset($_POST['id_produk']) ? $_POST['id_produk'] : array();
$jumlah_produk = isset($_POST['jumlah']) ? $_POST['jumlah'] : array();

mysqli_begin_transaction($conn);

try {

    $query_hapus_keranjang = "DELETE FROM keranjang WHERE id_pengguna = ?";
    $stmt_hapus_keranjang = mysqli_prepare($conn, $query_hapus_keranjang);
    mysqli_stmt_bind_param($stmt_hapus_keranjang, 'i', $id_pengguna);
    mysqli_stmt_execute($stmt_hapus_keranjang);

    foreach ($id_produk_dibeli as $index => $id_produk) {
        $jumlah = $jumlah_produk[$index];

        $query_daftarprodukpesanan = "INSERT INTO daftarprodukpesanan (id_produk, id_pengguna, jumlah) VALUES (?, ?, ?)";
        $stmt_daftarprodukpesanan = mysqli_prepare($conn, $query_daftarprodukpesanan);
        mysqli_stmt_bind_param($stmt_daftarprodukpesanan, 'iii', $id_produk, $id_pengguna, $jumlah);
        mysqli_stmt_execute($stmt_daftarprodukpesanan);
    }

    
    $query_checkout = "INSERT INTO datacheckout (id_pengguna, nama_penerima, alamat_detail, total_pembayaran) VALUES (?, ?, ?, ?)";
    $stmt_checkout = mysqli_prepare($conn, $query_checkout);
    mysqli_stmt_bind_param($stmt_checkout, 'isss', $id_pengguna, $nama_penerima, $alamat, $total_pembayaran);
    mysqli_stmt_execute($stmt_checkout);


    $id_checkout = mysqli_insert_id($conn);


    $query_detail_checkout = "INSERT INTO detail_checkout (id_datacheckout, id_produk, jumlah) VALUES (?, ?, ?)";
    $stmt_detail_checkout = mysqli_prepare($conn, $query_detail_checkout);

    foreach ($id_produk_dibeli as $index => $id_produk) {
        $jumlah = $jumlah_produk[$index];
        mysqli_stmt_bind_param($stmt_detail_checkout, 'iii', $id_checkout, $id_produk, $jumlah);
        mysqli_stmt_execute($stmt_detail_checkout);
    }

    mysqli_commit($conn);


header("Location: pilih_pembayaran.php?id_datacheckout=$id_checkout");

    exit;
} catch (Exception $e) {
    
    mysqli_rollback($conn);
    echo "Terjadi kesalahan: " . $e->getMessage();
}

?>
