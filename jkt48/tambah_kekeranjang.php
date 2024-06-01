<?php
session_start();
include 'koneksi.php'; // Sertakan file koneksi

// Ambil id_produk dari URL
$id_produk = isset($_GET['id_produk']) ? intval($_GET['id_produk']) : 0;
$id_pengguna = $_SESSION['id_pengguna']; // Asumsikan id_pengguna disimpan dalam session

// Cek apakah produk sudah ada di keranjang
$query = "SELECT * FROM keranjang WHERE id_pengguna = $id_pengguna AND id_produk = $id_produk";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // Jika produk sudah ada di keranjang, tambahkan jumlahnya
    $query = "UPDATE keranjang SET jumlah = jumlah + 1 WHERE id_pengguna = $id_pengguna AND id_produk = $id_produk";
} else {
    // Jika produk belum ada di keranjang, tambahkan sebagai item baru
    $query = "INSERT INTO keranjang (id_pengguna, id_produk, jumlah) VALUES ($id_pengguna, $id_produk, 1)";
}

mysqli_query($conn, $query);
echo '<script>
    window.location.href = "detailproduk.php?id='.$id_produk.'";
    alert("Produk berhasil dimasukkan ke keranjang!");
</script>';

?>
