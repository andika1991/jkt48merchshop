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
    // Hapus keranjang
    $query_hapus_keranjang = "DELETE FROM keranjang WHERE id_pengguna = $id_pengguna";
    if (!mysqli_query($conn, $query_hapus_keranjang)) {
        throw new Exception(mysqli_error($conn));
    }

    // Insert into datacheckout
    $query_checkout = "INSERT INTO datacheckout (id_pengguna, nama_penerima, alamat_detail, total_pembayaran) VALUES ($id_pengguna, '$nama_penerima', '$alamat', '$total_pembayaran')";
    if (!mysqli_query($conn, $query_checkout)) {
        throw new Exception(mysqli_error($conn));
    }

    $id_checkout = mysqli_insert_id($conn);

    // Insert into detail_checkout
    $id_detail = 0;
    
    foreach ($id_produk_dibeli as $index => $id_produk) {
        $jumlah = !empty($jumlah_produk[$index]) ? $jumlah_produk[$index] : 1; // Default value of 1 if not provided
        $query_detail_checkout = "INSERT INTO detail_checkout (id_datacheckout, id_produk, jumlah) VALUES ($id_checkout, $id_produk, $jumlah)";
        if (!mysqli_query($conn, $query_detail_checkout)) {
            throw new Exception(mysqli_error($conn));
        }

        $id_detail = mysqli_insert_id($conn);  // Get the last inserted id_detail
    }

    mysqli_commit($conn);

    header("Location: pilih_pembayaran.php?id_datacheckout=$id_checkout&id_detail=$id_detail");
    exit;
} catch (Exception $e) {
    mysqli_rollback($conn);
    echo "Terjadi kesalahan: " . $e->getMessage();
}
?>
